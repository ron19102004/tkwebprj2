<?php
if (isset($_GET['id'])) {
    echo '<input type="text" hidden value="' . htmlspecialchars($_GET['id']) . '" id="id_productO">';
}
?>
<section>
    <h1 class="font-bold text-xl">Số lượng đã xuất</h1>
    <input type="text" hidden id="url_request_o" value="<?php echo Helper::routes('quantity-out.route.php'); ?>">
    <table class="min-w-full border-collapse block md:table max-h-screen overflow-auto">
        <thead class="block md:table-header-group">
            <tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                <th class="bg-gray-800 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Mã số lượng</th>
                <th class="bg-gray-800 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Mã sản phẩm</th>
                <th class="bg-gray-800 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Giá trị</th>
                <th class="bg-gray-800 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Ngày xuất</th>
            </tr>
        </thead>
        <tbody class="block md:table-row-group" id="data-o">
        </tbody>
    </table>
</section>
<script>
    const url_request_o = document.getElementById('url_request_o').value;
    const id_productO = document.getElementById('id_productO').value;
    const renderO= () => {
        $(() => {
            $.get(url_request_o, {
                method: "findByIdProduct",
                id_product: id_productO
            }, (data) => {
                try {
                    const qs = JSON.parse(data);
                    $('#data-o').html(qs?.map((q) => {
                        return `
                            <tr class="bg-gray-100 border border-grey-500 md:border-none block md:table-row">
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Mã số lượng</span>${q?.id}</td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Mã sản phẩm</span>${q?.id_product}</td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Giá trị</span>${q?.value}</td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Ngày xuất</span>${q?.date}</td>
                            </tr>
                            `;
                    }).join(''));
                } catch (error) {

                }
            })
        })
    }
    renderO();
</script>