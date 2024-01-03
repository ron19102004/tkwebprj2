<?php
if (isset($_GET['edit']) && isset($_GET['id'])) {
    if ($_GET['edit'] == 'color') {
        echo '<input type="text" hidden value="color" id="edit">';
        echo '<input type="text" hidden id="url-edit" value="' . Helper::routes('color.route.php') . '">';
    } else if ($_GET['edit'] == 'size') {
        echo '<input type="text" hidden value="size" id="edit">';
        echo '<input type="text" hidden id="url-edit" value="' . Helper::routes('size.route.php') . '">';
    }
    echo '<input type="text" hidden value="' . htmlspecialchars($_GET['id']) . '" id="id">';
}
?>
<section class="md:flex md:flex-col md:justify-center min-h-screen md:-translate-y-12" id="form-edit">
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
                        <form action="${url}" method="post" class="space-y-3 xl:mx-60 lg:mx-52 md:mx-36 bg-gray-800 text-white p-3">
                            <h1 class="text-3xl font-bold text-center">Chỉnh sửa ${edit === 'size' ? 'kích thước':'màu sắc'}</h1>
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
                                <label class="font-bold text-2xl">Giá trị</label>
                                <input type="text" value="${res?.data?.value}" name="value" class="w-full rounded border outline-none text-gray-800">
                            </div>
                            <div class="float-right pt-3">
                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Lưu thay đổi</button>
                                <a href="<?php echo Helper::pages('admin/color-size.php'); ?>" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Hủy</a>
                            </div>
                            </form>
                        `)
                } catch (error) {

                }
            })
        }
    })
</script>