<?php
if (isset($_GET['edit']) && isset($_GET['id'])) {
    if ($_GET['edit'] == 'brand') {
        echo '<input type="text" hidden value="brand" id="edit">';
        echo '<input type="text" hidden id="url-edit" value="' . Helper::routes('brand.route.php') . '">';
    } else if ($_GET['edit'] == 'category') {
        echo '<input type="text" hidden value="category" id="edit">';
        echo '<input type="text" hidden id="url-edit" value="' . Helper::routes('category.route.php') . '">';
    }
    echo '<input type="text" hidden value="' . htmlspecialchars($_GET['id']) . '" id="id">';
}
?>
<section class="md:flex md:flex-col md:justify-center min-h-screen md:-translate-y-12 " id="form-edit">
</section>
<script>
    $(() => {
        const edit = $('#edit').val();
        const url = $('#url-edit').val();
        const id = $('#id').val();
        if (parseInt(id) > 0) {
            $.get(url, {
                method: "findById",
                id: parseInt(id)
            }, (data) => {
                try {
                    const res = JSON.parse(data);
                    $('#form-edit').html(`
                        <form action="${url}" method="post" class="space-y-3 xl:mx-60 lg:mx-52 md:mx-36 bg-gray-800 text-white p-3" enctype="multipart/form-data">
                            <h1 class="text-3xl font-bold text-center">Chỉnh sửa ${edit === 'brand' ? 'thương hiệu':'danh mục'}</h1>
                            <input type="text" hidden name="method" value="edit">
                            <input type="text" hidden name="id" value="${id}">
                            <div class="w-full bg-gray-800 text-white">
                                <label class="font-bold text-2xl">Mã số</label>
                                <input type="text" value="${res?.data?.id}" disabled class="w-full rounded outline-none bg-gray-800 text-white">
                            </div>
                            <div>
                                <label class="font-bold text-2xl">Tên</label>
                                <input type="text" value="${res?.data?.name}" name="name" class="w-full rounded border outline-none text-gray-800">
                            </div>
                            <div>
                                <label class="font-bold text-2xl">Ảnh đại diện / LOGO</label>
                               <div class="max-h-56 w-full overflow-auto">
                                    <img src="<?php echo Helper::assets(); ?>${edit === 'brand' ?res?.data?.avatar : res?.data?.image}" alt="${res?.data?.name}" class="max-h-full w-full object-cover overflow-auto">
                               </div>
                            </div>
                            <div>
                                <label class="text-white font-bold text-lg">Cập nhật ảnh đại diện/LOGO</label>
                                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file" name="file">
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">JPG, JPEG,PNG,GIF.</p>
                            </div>
                            <div class="float-right pt-3">
                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Lưu thay đổi</button>
                                <a href="<?php echo Helper::pages('admin/brand-category.php'); ?>" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Hủy</a>
                            </div>
                        </form>
                        `)
                } catch (error) {

                }
            })
        }
    })
</script>