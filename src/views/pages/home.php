<!DOCTYPE html>
<html lang="en">

<head>
    <?php require($_SERVER['DOCUMENT_ROOT'] . "/src/views/layouts/head.layout.php"); ?>
    <title>HOME</title>
</head>

<body>
    <?php Helper::addLayout('header.layout.php'); ?>
    <main>
        <?php Helper::addPage('components/comment.component.php'); ?>
        <div id="editor"></div>
        <script>
            ClassicEditor
                .create(document.querySelector('#editor'))
                .catch(error => {
                    console.error(error);
                });
        </script>

    </main>
    <?php Helper::addLayout('footer.layout.php'); ?>
</body>

</html>