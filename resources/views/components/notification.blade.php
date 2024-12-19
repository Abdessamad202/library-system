@props(['message'])
<style>
    body {
        position: relative;
        z-index: -1;
    }
    .notification {
        position: fixed;
        bottom: 50px;
        z-index: 1000;
        right: -550px;
        box-sizing: border-box;
        color: white;
        transition: all 0.5s ease;
        padding: 20px 30px;
        font-weight: bold;
        border-radius: 5px;
        background-color: #1e293b;
        /* width: 200px; */
        /* height: 20px; */
    }

    .notification.active {
        right: 50px;
    }
</style>
<div class="notification active  ">{{ $message }}</div>

<script>
    const notification = document.querySelector('.notification');
        if (notification.innerHTML) {
            setTimeout(() => {
                notification.classList.add('active');
            }, 100);
            setTimeout(() => {
                notification.classList.remove('active');
            }, 3000);
        }
</script>