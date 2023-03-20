
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>/login/dashboard">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->



</main><!-- End #main -->


<script>
    var i = document.getElementById('inputImage');
    var y = document.getElementById('image');
    var u = "<?= $data['user']->hinhanh ?>";
    var v = "<?= ASSETS ?>admin/assets/img/avatar.jpg";
    if (u != "") {
        v = "<?= ROOT . "uploads/" . $data['user']->hinhanh ?>";
    }

    i.onchange = e => {
        const [file] = i.files;
        if (file)
            y.src = URL.createObjectURL(file);
    }

    document.getElementById("remove").onclick = e => {
        i.value = "";
        y.src = v;
    }
</script>