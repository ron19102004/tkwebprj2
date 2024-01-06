<input type="text" hidden value="<?php echo Helper::routes('product.route.php'); ?>" id="url-pd">
<div class="py-14  bg-white">
    <h1 class="text-center text-2xl font-bold text-gray-800">All Products</h1>
</div>
<!-- Product List -->
<section class="py-10 bg-gray-100">
    <ul id="list-pd" class=" p-16 grid  justify-center items-center gap-6 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
    </ul>
    <!-- Next Button -->
    <div class="flex justify-center items-center">
        <button id="next-btn" class="flex items-center justify-center px-3 h-8 ms-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 ">
            Next
        </button>
    </div>
</section>
<script>
    function convertCurrencyFormat(inputString) {
        // Extract the numeric part from the input string
        const numericValue = parseFloat(inputString);

        // Check if the numeric value is a valid number
        if (!isNaN(numericValue)) {
            // Format the numeric value as currency with Vietnamese locale
            const formattedCurrency = numericValue.toLocaleString('vi-VN', {
                style: 'currency',
                currency: 'VND'
            });

            // Replace 'VND' with 'đ'
            const result = formattedCurrency.replace('VND', 'đ');

            return result;
        } else {
            // Handle invalid input
            console.error('Invalid input string');
            return inputString;
        }
    }
    var take = 8;
    $(() => {
        $('#next-btn').click(() => {
            take += 8;
            doLoad(take, 0);
        })
    })
    const doLoad = (take, skip) => {
        $(() => {
            $.get($('#url-pd').val(), {
                method: "getTakeSkip",
                take: take,
                skip: skip
            }, (data) => {
                try {
                    const res = JSON.parse(data);
                    if (res?.data?.length < 8) {
                        $('#next-btn').prop("disabled", true);
                    }
                    $('#list-pd').html(res?.data?.map((p) => {
                        const percent = (100 - ((parseInt(p?.discount) * 100) / parseInt(p?.price))).toFixed(2)
                        return `
                    <div class="w-full transform overflow-hidden rounded-lg bg-transparent shadow-lg duration-300 hover:scale-105 hover:shadow-xl">
                        <a href="?id=${p?.id}">
                            <img class="h-48 w-full object-cover object-center" src="<?php echo Helper::assets(); ?>${p?.avatar}" alt="${p?.name}" />
                            <div class="p-4">
                                <h2 class="mb-2 text-lg font-medium  text-gray-900">${p?.name}</h2>
                                <div class="flex items-center">
                                    <p class="mr-2 text-lg font-semibold text-blue-600 ">
                                    ${p?.discount === 0 ? convertCurrencyFormat(p?.price+"000VNĐ"):convertCurrencyFormat(p?.discount+"000VNĐ")}</p>
                                    <p class="text-base  font-medium text-red-500 line-through">
                                    ${p?.discount === 0 ? '':convertCurrencyFormat(p?.price+"000VNĐ")}
                                    </p>
                                    <p class="ml-auto text-base font-medium text-green-500">
                                        ${p?.discount > 0 ? `${percent ? '-'+percent+'%' : ''}`:''}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>    
                `
                    }).join(' '))
                } catch (error) {

                }
            })
        })
    }
    doLoad(take, 0)
</script>