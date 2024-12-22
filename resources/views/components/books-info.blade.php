@props(['statistics'])
<div class="tickets p-20 bg-white rad-10">
    <h2 class="mt-0 mb-10">Books Statistics</h2>
    <p class="mt-0 mb-20 c-grey fs-15">Everything About Support Books</p>
    <div class="d-flex txt-c gap-20 f-wrap">
      <div class="box p-20 rad-10 fs-13 c-grey">
        <i class="fa-solid fa-book-open fa-2x mb-10 c-orange"></i>
        <span class="d-block c-black fw-bold fs-25 mb-5 count">{{ $statistics['all'] }}</span>
        Total
      </div>
      <div class="box p-20 rad-10 fs-13 c-grey">
        <i class="fa-solid fa-spinner fa-2x mb-10 c-blue"></i>
        <span class="d-block c-black fw-bold fs-25 mb-5 count">{{ $statistics['pending'] }}</span>
        Pending
      </div>
      <div class="box p-20 rad-10 fs-13 c-grey">
        <i class="fa-regular fa-circle-check fa-2x mb-10 c-green"></i>
        <span class="d-block c-black fw-bold fs-25 mb-5 count">{{ $statistics['reserved'] }}</span>
        Reserved
      </div>
      <div class="box p-20 rad-10 fs-13 c-grey">
        <i class="fa-regular fa-rectangle-xmark fa-2x mb-10 c-red"></i>
        <span class="d-block c-black fw-bold fs-25 mb-5 count">{{ $statistics['cancelled'] }}</span>
        Cancelled
      </div>
    </div>
  </div>
  <script>
    let counts = document.querySelectorAll(".count")
    counts.forEach((el) => {
      let v = parseInt(el.innerHTML)
      let counter = 0
      let count = setInterval(() => {
        if (counter <=v) {
          el.innerHTML = counter
          counter++
        }else{
          clearTimeInterval(count)
        }
      }, 20);
    })
    console.log(conts);

  </script>