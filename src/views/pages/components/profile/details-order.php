<?php
if (isset($_GET['details_order'])) {
    echo '<input type="text" hidden value="' . htmlspecialchars($_GET['details_order']) . '" id="id_order">';
}
$userCurrent = json_decode($_SESSION['userCurrent'], true);
?>
<input type="text" hidden value="<?php echo Helper::routes('order.route.php'); ?>" id="url_order">
<input type="text" hidden value="<?php echo Helper::routes('progress.route.php'); ?>" id="url_progress">
<input type="text" hidden value="<?php echo $userCurrent['id'] ?>" id="id_user">

<section class="px-10 py-10 space-y-6">
    <div id="order"></div>
    <div>
        <h1 class="mb-4 text-center font-bold text-2xl text-gray-700">Tiến Độ Vận Chuyển</h1>
        <div class="grid xl:grid-cols-6 gap-4" id="progress">

        </div>
    </div>
</section>
<script>
    const id_user = document.getElementById('id_user').value;
    const id_order = document.getElementById('id_order').value;
    const url_progress = document.getElementById('url_progress').value;
    const url_order = document.getElementById('url_order').value;

    $(() => {
        $.get(url_order, {
            method: "findByIdOrder",
            id_user: id_user,
            id_order:id_order
        }, (data) => {
            try {
                const order = JSON.parse(data);
                $('#order').html(`
                    <div class="md:flex items-strech py-4 md:py-7 lg:py-5 border-t border-gray-50 bg-gray-50 px-4 shadow-lg hover:shadow-xl">
                        <div class="md:w-4/12 2xl:w-2/4 w-full">
                            <img src="<?php echo Helper::assets() ?>${order.avatar}" alt="Gray Sneakers" class="h-full object-center object-cover md:block hidden rounded-md" />
                            <img src="<?php echo Helper::assets() ?>${order.avatar}" alt="Gray Sneakers" class="md:hidden w-full h-full object-center object-cover rounded-md" />
                        </div>
                        <div class="md:pl-3 md:w-8/12 2xl:w-3/4 flex flex-col justify-center">
                            <p class="font-bold">${order.product_name}</p>
                            <div class="">
                                 <h1>Số lượng: ${order.quantity}</h1>
                                <h1>Thương hiệu: ${order.brand_name}</h1>
                                <h1>Màu sắc: ${order.id_color}</h1>
                                <h1>Kích thước: ${order.id_size}</h1>
                            </div>
                            <div class="">
                                <h1>Địa chỉ nhận: ${order.address}</h1>
                                <h1>Số điện thoại nhận: ${order.phoneNumber}</h1>
                            </div>
                        </div>
                    </div>
                    `)
            } catch (error) {}
        })
        $.get(url_progress, {
            method: "getAllByIdOrder",
            id_user: id_user,
            id_order: id_order,
        }, (data) => {
            try {
                const res=JSON.parse(data);
                $('#progress').html(res?.map((p,i)=>{
                    console.log(p);
                    return `
                        <div class="h-full text-center px-6 flex justify-center items-center ">
                            <div class="shadow-md hover:shadow-lg rounded-lg flex items-center justify-center border border-gray-200 p-3">
                                <div class=" flex flex-col items-center justify-center px-1 rounded-r-lg body-step">
                                    <h2 class="font-bold text-sm">${p.content}</h2>
                                    <p class="text-xs text-gray-600">
                                        ${p.time}
                                    </p>
                                </div>
                            </div>
                        </div>
                        ${i === res.length - 1 ? '': 
                        `<div class="rotate-90 md:rotate-0 flex-1 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M14 2h-7.229l7.014 7h-13.785v6h13.785l-7.014 7h7.229l10-10z" />
                            </svg>
                        </div>`}
                    `
                }).join(' '))
            } catch (error) {
                
            }
        })
    })
</script>