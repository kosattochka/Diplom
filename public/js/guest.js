document.querySelectorAll('.counter').forEach(counter => {
    const decrementBtn = counter.querySelector('.decrement');
    const incrementBtn = counter.querySelector('.increment');
    const countElement = counter.querySelector('.count');

    let count = parseInt(countElement.textContent);

    decrementBtn.addEventListener('click', () => {
      if (count > 0) {
        count--;
        countElement.textContent = count;
        updateSummary();
      }
    });

    incrementBtn.addEventListener('click', () => {
      count++;
      countElement.textContent = count;
      updateSummary();
    });
  });

  function updateSummary() {
    const adults = parseInt(document.querySelectorAll('.option-group')[0].querySelector('.count').textContent);
    const children = parseInt(document.querySelectorAll('.option-group')[1].querySelector('.count').textContent);

    document.querySelector('.guest-total').textContent = `${adults} взрослых, ${children} детей`;
  }
