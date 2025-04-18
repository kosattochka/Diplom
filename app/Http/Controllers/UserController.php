<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\EditRequest;
use App\Http\Requests\Auth\EmailRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\PasswordRequest;
use App\Http\Requests\Auth\RegRequest;
use App\Http\Resources\Card\ReservationResource;
use App\Mail\PasswordResetMail;
use App\Models\Contact;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

class UserController extends Controller
{
    public function page()
    {
        if (!Auth::check())
            return redirect('/');

        $contacts = Contact::query()
            ->where('vis', true)
            ->first();

        $reservations = Reservation::query()
            ->where('user_id', Auth::id())
            ->orderBy('end_date', 'desc')
            ->get();

        $reservations = ReservationResource::collection($reservations);
        $reservations = json_decode(json_encode($reservations), false);

        return view('pages.account', [
            'user' => Auth::user(),
            'contacts' => $contacts,
            'reservations' => $reservations,
        ]);
    }

    public function login(LoginRequest $request): Response
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request['password']
        ];

        if (!Auth::validate($credentials)) {
            return response(['status' => false, 'message' => 'Неверные данные'], 400);
        }

        // вход
        Auth::login(Auth::getProvider()->retrieveByCredentials($credentials));

        return response(['status' => true], 200);
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect('/');
    }

    public function register(RegRequest $request): Response
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => password_hash($request->password, PASSWORD_DEFAULT),
        ]);

        Auth::login($user);
        return response(['status' => true], 200);
    }

    public function forgot(EmailRequest $request): Response
    {
        $user = User::query()
            ->where('email', $request->email)
            ->first();

        if ($user == null)
            return response(['status' => false, 'message' => 'Неверная почта'], 404);

        $token = app('auth.password.broker')->createToken($user);

        $resetLink = '/password/reset/?token=' . $token . '&email=' . $request->email;

        Mail::to($user->email)->send(new PasswordResetMail($resetLink));

        return response(['status' => true]);
    }

    public function viewResetPassword(Request $request): array|string
    {
        $token = $request->query('token');
        $email = $request->query('email');

        if (!Password::tokenExists(User::where('email', $email)->first(), $token))
            return redirect('/')->with('error', 'Недействительный токен');

        return redirect('/')->with('email', $email);
    }

    public function changePassword(PasswordRequest $request): Response
    {
        $user = User::where('email', $request->email)->first();
        if ($user == null)
            return response(['status' => false, 'message' => 'Пользователь не найден'], 404);

        $user->update([
            'password' => Hash::make($request->password)
        ]);
        return response(['status' => true]);
    }

    public function edit(EditRequest $request): Response
    {
        $data = $request->only(['name', 'email']);
        $user = User::find($request->id);
        if ($user == null)
            return response(['status' => false, 'message' => 'Пользователь не найден'], 404);

        $user->update($data);
        return response(['status' => true]);
    }

}
