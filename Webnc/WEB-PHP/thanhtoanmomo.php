<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://unpkg.com/tailwindcss@2.0.2/dist/tailwind.min.css" rel="stylesheet">
    <title>
        MOMO
    </title>
</head>
<body class="h-screen overflow-hidden flex items-center justify-center" style="background: #edf2f7;">
<style>@import url(https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css);</style>
<style>
    /*
    module.exports = {
        plugins: [require('@tailwindcss/forms'),]
    };
    */
    .form-radio {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        -webkit-print-color-adjust: exact;
        color-adjust: exact;
        display: inline-block;
        vertical-align: middle;
        background-origin: border-box;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        flex-shrink: 0;
        border-radius: 100%;
        border-width: 2px;
    }

    .form-radio:checked {
        background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3ccircle cx='8' cy='8' r='3'/%3e%3c/svg%3e");
        border-color: transparent;
        background-color: currentColor;
        background-size: 100% 100%;
        background-position: center;
        background-repeat: no-repeat;
    }

    @media not print {
        .form-radio::-ms-check {
            border-width: 1px;
            color: transparent;
            background: inherit;
            border-color: inherit;
            border-radius: inherit;
        }
    }

    .form-radio:focus {
        outline: none;
    }

    .form-select {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%23a0aec0'%3e%3cpath d='M15.3 9.3a1 1 0 0 1 1.4 1.4l-4 4a1 1 0 0 1-1.4 0l-4-4a1 1 0 0 1 1.4-1.4l3.3 3.29 3.3-3.3z'/%3e%3c/svg%3e");
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        -webkit-print-color-adjust: exact;
        color-adjust: exact;
        background-repeat: no-repeat;
        padding-top: 0.5rem;
        padding-right: 2.5rem;
        padding-bottom: 0.5rem;
        padding-left: 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        background-position: right 0.5rem center;
        background-size: 1.5em 1.5em;
    }

    .form-select::-ms-expand {
        color: #a0aec0;
        border: none;
    }

    @media not print {
        .form-select::-ms-expand {
            display: none;
        }
    }

    @media print and (-ms-high-contrast: active), print and (-ms-high-contrast: none) {
        .form-select {
            padding-right: 0.75rem;
        }
    }
</style>

<div class="min-w-screen min-h-screen bg-gray-200 flex items-center justify-center px-5 pb-10 pt-16">
    <div class="w-full mx-auto rounded-lg bg-white shadow-lg p-5 text-gray-700" style="max-width: 600px">
        <div class="w-full pt-1 pb-5">
            <div class="bg-indigo-500 text-white overflow-hidden rounded-full w-20 h-20 -mt-16 mx-auto shadow-lg flex justify-center items-center">
                <i class="mdi mdi-credit-card-outline text-3xl"></i>
            </div>
        </div>
        <div class="mb-10">
            <h1 class="text-center font-bold text-xl uppercase">Lựa chọn thanh toán</h1>
        </div>
        <div class="mb-3 flex -mx-2">
            <div class="px-2  bg-blue-700 bg-pink-500 text-white font-bold py-2 px-4 rounded">
                <a  href="#">MOMO</a>
            </div>

            <div class="px-2 ml-2 bg-blue-700 hover:bg-pink-500 text-white font-bold py-2 px-4 rounded">
                <a  href="./thanhtoanpaypal.html">PayPal</a>
            </div>
        </div>



        <div class="">

            <img src="../assets/img/Capture1.PNG" height="324" width="317"/></div>
        <div>
            <button class="block w-full max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold"><i class="mdi mdi-lock-outline mr-1"></i> PAY NOW</button>
            <button class="mt-2 block w-full max-w-xs mx-auto bg-red-500 hover:bg-red-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold"><i class="mdi mdi-reply mr-1"></i> Thoát </button>
        </div>
    </div>
</div>

<!-- BUY ME A BEER AND HELP SUPPORT OPEN-SOURCE RESOURCES -->
<div class="flex items-end justify-end fixed bottom-0 right-0 mb-4 mr-4 z-10">
    <div>
        <a title="Buy me a beer" href="https://www.buymeacoffee.com/scottwindon" target="_blank" class="block w-16 h-16 rounded-full transition-all shadow hover:shadow-lg transform hover:scale-110 hover:rotate-12">
            <img class="object-cover object-center w-full h-full rounded-full" src="https://i.pinimg.com/originals/60/fd/e8/60fde811b6be57094e0abc69d9c2622a.jpg"/>
        </a>
    </div>
</div>
</body>
</html>
