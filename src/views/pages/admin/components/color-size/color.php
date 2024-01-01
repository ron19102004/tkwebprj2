<section>
    <h1>Màu Sắc</h1>
    <div>
        <?php Helper::addAdminComponent('color-size/add-color.php'); ?>
    </div>
    <input type="text" hidden id="url_request" value="<?php echo Helper::routes('color.route.php'); ?>">
    <table class="min-w-full border-collapse block md:table max-h-screen overflow-auto">
        <thead class="block md:table-header-group">
            <tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Mã màu</th>
                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Tên màu</th>
                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Giá trị</th>
                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Actions</th>
            </tr>
        </thead>
        <tbody class="block md:table-row-group" id="data">
            <script>
                $(() => {
                    const url_request = $('#url_request').val();
                    $.get(`${url_request}/?method=getAll`, (data) => {
                        try {
                            const colors = JSON.parse(data);
                            $('#data').html(colors.map((color) => {
                                console.log(color);
                                return `
                    <tr class="bg-gray-300 border border-grey-500 md:border-none block md:table-row">
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Mã màu</span>${color?.id}</td>
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Tên màu</span>${color?.name}</td>
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Giá trị</span>${color?.value}</td>
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                            <span class="inline-block w-1/3 md:hidden font-bold">Actions</span>
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded">Edit</button>
                            <a href="${url_request}/?method=delete&id=${color?.id}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded">Delete</a>
                        </td>
                   </tr>
                    `;
                            }).join(''));
                        } catch (error) {

                        }
                    })
                })
            </script>
        </tbody>
    </table>
</section>