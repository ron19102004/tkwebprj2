<?php
$userCurrent = null;
if (isset($_SESSION['userCurrent'])) {
    $userCurrent = json_decode($_SESSION['userCurrent'], true);
    echo '<input type="text" hidden id="id_user$" value="' . $userCurrent['id'] . '">';
} else {
    echo '<input type="text" hidden id="id_user$" value="-1">';
}
if (isset($_GET['id'])) {
    echo '<input type="text" hidden value="' . htmlspecialchars($_GET['id']) . '" id="id_product$">';
}
?>
<input type="text" hidden id="url_sys" value="<?php echo Helper::env('http'); ?>">
<input type="text" hidden id="url_comment" value="<?php echo Helper::routes('comment.route.php'); ?>">
<button id="add-cmt-toggle" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 flex justify-center items-center space-x-1">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 0 1-.825-.242m9.345-8.334a2.126 2.126 0 0 0-.476-.095 48.64 48.64 0 0 0-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0 0 11.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
    </svg>
    <span>
        Thêm bình luận
    </span>
</button>
<div class="hidden" id="add-cmt-form">
    <div class="flex justify-center items-end shadow-md rounded-lg ">
        <div class="w-full bg-white rounded-lg px-4 pt-2">
            <div class="flex flex-wrap -mx-3 mb-6">
                <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Thêm bình luận mới</h2>
                <div class="w-full md:w-full px-3 mb-2 mt-2">
                    <textarea id="cmt-content" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" name="body" placeholder='Type Your Comment' required></textarea>
                </div>
                <div class="w-full  flex items-start md:w-full px-3">
                    <div class="-mr-1">
                        <button onclick="addComment(null);" class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100">Thêm bình luận</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /card-cmt/ -->
<ul id="cmts" class="max-h-screen overflow-auto  space-y-2">
</ul>
<script>
    const id_user$ = document.getElementById('id_user$').value;
    const url_sys$ = document.getElementById('url_sys').value;
    const url_comment = document.getElementById('url_comment').value;
    const id_product$ = document.getElementById('id_product$').value
    const reply = (idParent) => {
        if (id_user$+'' === '-1') {
            window.location.href = url_sys$ + '/src/views/pages/auth/login.auth.php'
        }
        $(() => {
            $(`#reply${idParent}`).toggle();
            $(`#btn-reply${idParent}`).toggle();
        })
    }
    const addComment = (id_comment_reply) => {
        $(() => {
            if (!$('#cmt-content').val() && !$(`#cmt-content${id_comment_reply}`).val()) {
                $.toast({
                    heading: 'Error',
                    text: 'Nội dung bình luận không được trống',
                    showHideTransition: 'fade',
                    icon: 'error'
                })
                return;
            }
            $.post(url_comment, {
                method: "add",
                id_user: id_user$,
                id_product: id_product$,
                content: id_comment_reply === null ? $('#cmt-content').val() : $(`#cmt-content${id_comment_reply}`).val(),
                id_comment_reply: id_comment_reply === null ? 0 : id_comment_reply
            }, (data) => {
                try {
                    console.log(data);
                    const res = JSON.parse(data);
                    if (res.status === 'success') {
                        $.toast({
                            heading: 'Success',
                            text: res.message,
                            showHideTransition: 'fade',
                            icon: 'success'
                        })
                        if (id_comment_reply === null) $('#add-cmt-form').toggle('slow')
                        else reply(id_comment_reply)
                        loadCmt();
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
    $(() => {
        $('#add-cmt-toggle').click(() => {
            if (id_user$+'' === '-1') {
                window.location.href = url_sys$ + '/src/views/pages/auth/login.auth.php'
            }
            $('#add-cmt-form').toggle('slow')
        })
    })
    const loadCmt = () => {
        $(() => {
            $.get(url_comment, {
                method: "findByIdProduct",
                id_product: id_product$
            }, (data) => {
                try {
                    const res = JSON.parse(data);
                    if (res.status === 'success') {
                        const data$ = res?.data
                        const listParrentCmt = [];
                        let listChildCmt = [];
                        data$.forEach(cmt => {
                            if (cmt?.id_comment_reply + '' === '0') listParrentCmt.push(cmt)
                            else listChildCmt.push(cmt)
                        });
                        const listView = listParrentCmt?.map((cmt) => {
                            const child = listChildCmt.filter((childCmt) => cmt?.id + '' === childCmt.id_comment_reply + '');
                            listChildCmt = listChildCmt.filter((i) => !child.includes(i));
                            return {
                                parent: cmt,
                                child: child
                            }
                        })
                        $('#cmts').html(listView?.map((cmt) => {
                            const child = cmt?.child?.map((i) => {
                                return `
                                <div class="text-sm ml-8 bg-slate-200 p-3 rounded-md">
                                    <div class="flex justify-start items-end space-x-1">
                                        <div class="w-8 h-8 overflow-hidden bg-yellow-500 rounded-full flex items-center justify-center font-bold text-white">
                                            <img src="<?php echo Helper::assets() ?>${i.avatar}" alt="${i.lastName}">
                                        </div>
                                        <h1 class="text-lg text-gray-700 font-semibold hover:underline cursor-pointer flex flex-col justify-start items-start">
                                            <span>${i.firstName} ${i.lastName}</span>
                                            <span class ="text-xs">${i.time}</span>
                                        </h1>
                                    </div>
                                    <div class="">
                                        <p class="mt-4 text-gray-600">${i.content}</p>
                                    </div>
                                </div>
                                `
                            });
                            const html = `
                            <div class="bg-gray-100 rounded-2xl shadow-lg hover:shadow-2xl transition duration-500">
                                <div class="">
                                    <div class="bg-gray-100 rounded-2xl px-10 py-6  space-y-3">
                                        <div class="flex justify-start items-end space-x-1">
                                            <div class="w-14 h-14 overflow-hidden bg-yellow-500 rounded-full flex items-center justify-center font-bold text-white">
                                                <img src="<?php echo Helper::assets() ?>${cmt.parent.avatar}" alt="${cmt.parent.lastName}"
                                                class="object-cover"
                                                >
                                            </div>
                                            <h1 class="text-lg text-gray-700 font-semibold hover:underline cursor-pointer flex flex-col justify-start items-start">
                                              <span>${cmt.parent.firstName} ${cmt.parent.lastName}</span>
                                              <span class ="text-xs">${cmt.parent.time}</span>
                                            </h1>
                                        </div>
                                        <div class="">
                                            <p class="mt-4 text-gray-600">${cmt.parent.content}</p>
                                        </div>
                                        <ul class="max-h-96 overflow-auto space-y-2">
                                        ${child.join('')}
                                        </ul>
                                        <div class="">
                                            <div class="flex justify-end items-center">
                                                <button onclick="reply(${cmt.parent.id})" id="btn-reply${cmt.parent.id}" type="button" class="py-2 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-full border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 flex justify-center items-center space-x-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
                                                    </svg>
                                                    <span>Phản hồi</span>
                                                </button>
                                            </div>
                                            <div class="hidden" id="reply${cmt.parent.id}">
                                                <div class="flex justify-center items-end shadow-md rounded-lg relative">
                                                    <button onclick="reply(${cmt.parent.id})" class="absolute top-1 right-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                        </svg>
                                                    </button>
                                                    <div class="w-full bg-white rounded-lg px-4 pt-2">
                                                        <div class="flex flex-wrap -mx-3 mb-6">
                                                            <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg ">
                                                                <span>Phản hồi trong bình luận ${cmt.parent.firstName} ${cmt.parent.lastName} </span>
                                                            </h2>
                                                            <div class="w-full md:w-full px-3 mb-2 mt-2">
                                                                <textarea id="cmt-content${cmt.parent.id}" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" name="body" placeholder='Type Your Comment' required></textarea>
                                                            </div>
                                                            <div class="w-full flex items-start md:w-full px-3">
                                                                <div class="-mr-1">
                                                                    <button onclick="addComment(${cmt.parent.id});" class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100">Thêm phản hồi</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            `
                            return html;
                        }).join(''))
                    }
                } catch (error) {}
            })
        })
    }
    loadCmt();
</script>