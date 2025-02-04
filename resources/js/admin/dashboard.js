let counts = document.querySelectorAll(".count")
counts.forEach((el) => {
  let v = parseInt(el.innerHTML)
  let counter = 0
  let count = setInterval(() => {
    if (counter <= v) {
      el.innerHTML = counter
      counter++
    } else {
      clearTimeInterval(count)
    }
  }, 20);
})