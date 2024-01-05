<!-- component -->
<?php
$userCurrent = json_decode($_SESSION['userCurrent'], true);
?>
<input type="text" hidden id="url_cart" value="<?php echo Helper::routes('cart.route.php'); ?>">
<input type="number" hidden id="id_user" value="<?php echo $userCurrent['id']; ?>">
<input type="text" hidden id="url_ship" value="<?php echo Helper::routes('ship.route.php'); ?>">
<input type="text" hidden id="url_order" value="<?php echo Helper::routes('order.route.php'); ?>">

<div class="px-4 pb-14 md:px-6 2xl:px-20 2xl:container 2xl:mx-auto">
    <div class="mt-10 flex flex-col xl:flex-row jusitfy-center items-stretch w-full xl:space-x-8 space-y-4 md:space-y-6 xl:space-y-0">
        <div class="flex flex-col justify-start items-start w-full space-y-4 md:space-y-6 xl:space-y-8">
            <div class="flex flex-col justify-start items-start  bg-gray-100 px-4 py-4 md:py-6 md:p-6 xl:p-8 w-full">
                <p class="text-lg md:text-xl  font-semibold leading-6 xl:leading-5 text-gray-800">
                    Giỏ hàng của <?php echo $userCurrent['lastName'] ?>
                </p>
                <ul id="list-cart" class="flex flex-col justify-start items-start  bg-gray-100 px-4 py-4 md:py-6 md:p-6 xl:p-8 w-full">
                </ul>
            </div>
            <div class="flex justify-center md:flex-row flex-col items-stretch w-full space-y-4 md:space-y-0 md:space-x-6 xl:space-x-8">
                <div class="flex flex-col px-4 py-6 md:p-6 xl:p-8 w-full bg-gray-100  space-y-6">
                    <h3 class="text-xl  font-semibold leading-5 text-gray-800">Tóm tắt</h3>
                    <div class="flex justify-center items-center w-full space-y-4 flex-col border-gray-200 border-b pb-4">
                        <div class="flex justify-between items-center w-full">
                            <p class="text-base  leading-4 text-gray-800">Tiền vận chuyển</p>
                            <p class="text-base  leading-4 text-gray-600">30.000đ</p>
                        </div>
                    </div>
                    <div class="flex justify-between items-center w-full">
                        <p class="text-base  font-semibold leading-4 text-gray-800">Tổng</p>
                        <p class="text-base  font-semibold leading-4 text-gray-600" id="total">0</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-gray-100  w-full xl:w-96 flex justify-between items-center md:items-start px-4 py-6 md:p-6 xl:p-8 flex-col">
            <div class=" flex justify-between items-center md:items-start flex-col">
                <h3 class="text-xl  font-semibold leading-5 text-gray-800">
                    Khách hàng
                </h3>
                <div class="flex flex-col md:flex-row xl:flex-col justify-start items-stretch h-full w-full md:space-x-6 lg:space-x-8 xl:space-x-0">
                    <div class="flex flex-col justify-start items-start flex-shrink-0">
                        <div class="flex justify-center w-full md:justify-start items-center space-x-4 py-8 border-b border-gray-200">
                            <img src="<?php echo Helper::assets() . $userCurrent['avatar'] ?>" alt="avatar" class="w-10 h-10 object-cover" />
                            <div class="flex justify-start items-start flex-col space-y-2">
                                <p class="text-base  font-semibold leading-4 text-left text-gray-800">
                                    <?php echo $userCurrent['firstName'] . ' ' . $userCurrent['lastName']; ?>
                                </p>
                            </div>
                        </div>

                        <div class="flex justify-center text-gray-800  md:justify-start items-center space-x-4 py-4 border-b border-gray-200 w-full">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19 5H5C3.89543 5 3 5.89543 3 7V17C3 18.1046 3.89543 19 5 19H19C20.1046 19 21 18.1046 21 17V7C21 5.89543 20.1046 5 19 5Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M3 7L12 13L21 7" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <p class="cursor-pointer text-sm leading-5 "><?php echo $userCurrent['email'] ?></p>
                        </div>
                    </div>
                    <div class="flex justify-between xl:h-full items-stretch w-full flex-col mt-6 md:mt-0">
                        <div class="flex justify-center md:justify-start xl:flex-col flex-col md:space-x-6 lg:space-x-8 xl:space-x-0 space-y-4 xl:space-y-12 md:space-y-0 md:flex-row items-center md:items-start">
                            <div class="flex justify-center md:justify-start items-center md:items-start flex-col space-y-4">
                                <p class="text-base  font-semibold leading-4 text-center md:text-left text-gray-800">
                                    Địa chỉ nhận hàng
                                </p>
                                <ul id="list-address" class="space-y-3">

                                </ul>


                                <!-- Modal toggle -->
                                <button data-modal-target="default-modal" data-modal-toggle="default-modal" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2" type="button">
                                    Thêm địa chỉ
                                </button>

                                <!-- Main modal -->
                                <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow ">
                                            <!-- Modal header -->
                                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                                                <h3 class="text-xl font-semibold text-gray-900">
                                                    Thêm địa chỉ
                                                </h3>
                                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center " data-modal-hide="default-modal">
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="p-4 md:p-5 space-y-4">
                                                <div class="w-full font-bold">
                                                    <label>Số điện thoại</label>
                                                    <input type="tel" name="pn" id="phoneNumber" required class="w-full rounded">
                                                </div>
                                                <div class="w-full font-bold">
                                                    <label>Địa chỉ</label>
                                                    <textarea type="text" name="pn" id="address-input" required class="w-full rounded"></textarea>
                                                </div>
                                            </div>
                                            <!-- Modal footer -->
                                            <div onclick="addAddress()" class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b ">
                                                <button data-modal-hide="default-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Thêm</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="payment">
                <button type="button" onclick="payment()" class="min-w-full text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Thanh toán</button>
            </div>
        </div>
    </div>
</div>

<script>
    function getSelectedRadioValue(name) {
        var genderRadios = document.getElementsByName(name);
        for (var i = 0; i < genderRadios.length; i++) {
            if (genderRadios[i].checked) {
                return genderRadios[i].value;
            }
        }
        return null;
    }

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
    const url_order = document.getElementById('url_order').value
    const url_cart = document.getElementById('url_cart').value
    const url_ship = document.getElementById('url_ship').value
    const id_user = document.getElementById('id_user').value
    var id_discount = 0;
    const carts_id = []
    var total_price = 30;
    const payment = () => {
        const id_ship = getSelectedRadioValue('address');
        if (!id_ship) {
            $.toast({
                heading: 'Error',
                text: 'Vui lòng chọn địa chỉ nhận',
                showHideTransition: 'fade',
                icon: 'error'
            })
            return;
        }
        let re = true;
        carts_id.forEach(id => {
            $.post(url_order, {
                method: "add",
                id_user: id_user,
                id_cart: id,
                id_ship: id_ship,
                id_discount: id_discount
            }, (data) => {
                try {
                    if (res.status === 'success') {
                        re = true
                    } else re = false

                } catch (error) {
                    re = false;
                }
            })
        })
        if (!re) {
            $.toast({
                heading: 'Error',
                text: 'Có lỗi khi thanh toán',
                showHideTransition: 'fade',
                icon: 'error'
            })
        } else {
            $.toast({
                heading: 'Success',
                text: 'Thanh toán thành công',
                showHideTransition: 'fade',
                icon: 'success'
            })
            location.reload();
        }
    }
    const addAddress = () => {
        $(() => {
            const address = $('#address-input').val();
            const phoneNumber = $('#phoneNumber').val();
            if (!address || !phoneNumber) {
                $.toast({
                    heading: 'Error',
                    text: 'Số điện thoại và địa chỉ không được trống',
                    showHideTransition: 'fade',
                    icon: 'error'
                })
                return;
            }
            $.post(url_ship, {
                address: address,
                phoneNumber: phoneNumber,
                id_user: id_user,
                method: 'add'
            }, (data) => {
                try {
                    const res = JSON.parse(data);
                    if (res.status === 'success') {
                        $.toast({
                            heading: 'Success',
                            text: res.message,
                            showHideTransition: 'fade',
                            icon: 'success'
                        })
                        $('#address-input').val('')
                        $('#phoneNumber').val('')
                        loadShip();
                        return;
                    }
                    $.toast({
                        heading: 'Error',
                        text: res.message,
                        showHideTransition: 'fade',
                        icon: 'error'
                    })
                } catch (error) {

                }
            })
        })
    }
    const deleteShip = (id) => {
        $(() => {
            $.get(url_ship, {
                id: id,
                id_user: id_user,
                method: 'delete'
            }, (data) => {
                try {
                    const res = JSON.parse(data);
                    if (res.status === 'success') {
                        $.toast({
                            heading: 'Success',
                            text: res.message,
                            showHideTransition: 'fade',
                            icon: 'success'
                        })
                        loadShip();
                        return;
                    }
                    $.toast({
                        heading: 'Error',
                        text: res.message,
                        showHideTransition: 'fade',
                        icon: 'error'
                    })
                } catch (error) {

                }
            })
        })
    }
    const deleteCart = (id) => {
        $(() => {
            $.get(url_cart, {
                id: id,
                id_user: id_user,
                method: 'delete'
            }, (data) => {
                try {
                    const res = JSON.parse(data);
                    if (res.status === 'success') {
                        $.toast({
                            heading: 'Success',
                            text: res.message,
                            showHideTransition: 'fade',
                            icon: 'success'
                        })
                        total_price = 30
                        cartLoad();
                        return;
                    }
                    $.toast({
                        heading: 'Error',
                        text: res.message,
                        showHideTransition: 'fade',
                        icon: 'error'
                    })
                } catch (error) {

                }
            })
        })
    }
    const loadShip = () => {
        $(() => {
            $.get(url_ship, {
                method: "getAll",
                id_user: id_user
            }, (data) => {
                try {
                    const res = JSON.parse(data);
                    $('#list-address').html(res?.map((ship) => {
                        return `
                    <p class="w-48 lg:w-full  xl:w-48 text-center md:text-left text-sm leading-5 text-gray-600 flex justify-between items-center space-x-4">
                        <span>${ship.address}-${ship.phoneNumber}</span>
                        <span class="flex items-center justify-between space-x-4">
                            <input type="radio" name="address" id="address" value="${ship.id}">
                            <span onclick="deleteShip(${ship.id});" class="cursor-pointer rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </span>
                        </span>
                    </p>
                    `
                    }).join(''))
                } catch (error) {

                }
            })
        })
    }
    loadShip()
    const cartLoad = () => {
        $(() => {
            $.get(url_cart, {
                method: "findByIdUser",
                id_user: id_user,
            }, (data) => {
                try {
                    const res = JSON.parse(data);

                    $('#list-cart').html(res?.data?.carts?.map((cart) => {
                        carts_id.push(cart.id)
                        total_price += cart.discount > 0 ? cart.discount * cart.quantity : cart.price * cart.quantity
                        return `
                        <div class="mt-4 md:mt-6 flex flex-col md:flex-row justify-start items-start md:items-center md:space-x-6 xl:space-x-8 w-full">
                            <div class="pb-4 md:pb-8 w-full md:w-40">
                                <img class="w-full hidden md:block hover:scale-110 transition-all hover:shadow-lg" src="<?php echo Helper::assets() ?>${cart.product_avatar}" alt="${cart.product_name}" />
                                <img class="w-full md:hidden" src="<?php echo Helper::assets() ?>${cart.product_avatar}" alt="${cart.product_name}" />
                            </div>
                            <div class="border-b border-gray-200 md:flex-row flex-col flex justify-between items-start w-full pb-8 space-y-4 md:space-y-0">
                                <div class="w-full flex flex-col justify-start items-start space-y-8">
                                    <h3 class="${cart.available > 0 ? '' : 'line-through'} text-lg  xl:text-xl font-semibold leading-6 text-gray-800">${cart.product_name} ${cart.available > 0 ?'':'(Hết hàng)'}</h3>
                                    <div class="flex justify-start items-start flex-col space-y-2">
                                        <p class="text-sm  leading-none text-gray-800"><span class="text-gray-500">Thương hiệu: </span> ${cart.brand_name}</p>
                                        <p class="text-sm  leading-none text-gray-800"><span class="text-gray-500">Kích thước: </span>  ${cart.id_size}</p>
                                        <p class="text-sm  leading-none text-gray-800"><span class="text-gray-500">Màu sắc: </span> ${cart.id_color}</p>
                                    </div>
                                </div>
                                <div class="flex flex-col justify-between">
                                    <div class="flex justify-between space-x-8 items-start w-full">
                                        <p class="text-base  xl:text-lg leading-6">
                                        ${cart.discount > 0 ? convertCurrencyFormat(cart.discount+"000VNĐ"):convertCurrencyFormat(cart.price+"000VNĐ")}
                                        <span class="text-red-300 line-through">
                                        ${cart.discount > 0 ? convertCurrencyFormat(cart.price+"000VNĐ"):''}
                                        </span></p>
                                        <p class="text-base  xl:text-lg leading-6 text-gray-800">${cart.quantity}</p>
                                        <p class="text-base  xl:text-lg font-semibold leading-6 text-gray-800">
                                        ${cart.discount > 0 ? convertCurrencyFormat((cart.discount * cart.quantity)+"000VNĐ"):convertCurrencyFormat((cart.price * cart.quantity)+"000VNĐ")}
                                        </p>
                                    </div>
                                    <div class="float-right">
                                        <button onclick="deleteCart(${cart.id});" class="flex items-center float-right">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            <span>Xóa</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `
                    }).join(''))
                    $('#total').text(convertCurrencyFormat(total_price + "000VNĐ"))
                } catch (error) {

                }
            })
        })
    }
    cartLoad()
</script>