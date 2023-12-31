<!DOCTYPE html>
<html lang="en">

<head>
    <?php require($_SERVER['DOCUMENT_ROOT'] . "/src/views/layouts/head.layout.php"); ?>
    <title>Document</title>
</head>

<body>
    <?php require($_SERVER['DOCUMENT_ROOT'] . "/src/views/layouts/header.layout.php"); ?>
    <main>
        <?php include($_SERVER['DOCUMENT_ROOT'] . "/src/views/pages/components/comment.component.php"); ?>
        <div id="editor"></div>
        <script>
            ClassicEditor
                .create(document.querySelector('#editor'))
                .catch(error => {
                    console.error(error);
                });
        </script>

    </main>
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/src/views/layouts/footer.layout.php"); ?>
</body>

</html>