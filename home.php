<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Home</title>
</head>
<style>
    #resultlist{
        position: absolute;
        width: 81%;
        max-width: 89%;
        cursor: pointer;
        overflow-y: auto;
        max-height: 450px;
        box-sizing: border-box;
        z-index: 1001;
    }
    .link-class:hover{
        background-color: #f1f1f1;
        cursor: pointer;
    }
    input{
        width: 100%;
        height: 30px;
        border-radius: 15px;
        border-color: rgb(0, 217, 255);
        padding: 15px;
    }
</style>
<body>
    <div class="container">
        <h1 align="center">PHP AJAX SMK Taruna Bhakti</h1>
        <h2 align="center" class="mb-4 mt-1">Autocomplate Dengan Gambar dan Ajax</h2>
        <div align="center">
            <input type="text" id="nama_siswa" placeholder="Cari Nama Siswa..." class="from-control">
        </div>
        <ul class="list-group" id="resultlist"></ul>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $.ajaxSetup({cache: false});
        $('#nama_siswa').keyup(function(){
            $('#resultlist').html('');
            $('#state').val('');
            let nama_siswa = $('#nama_siswa').val();

            $.ajax({
                type: 'POST',
                url: "get_data.php",
                data: {nama_siswa:nama_siswa},
                success: function(data) {
                    $.each(JSON.parse(data), function(key, value){
                        $('#resultlist').append(`
                        <li class="list-group-item link-class">
                            <img src="avatar/`+value.avatar+`" height="40px" width="40px" class="img-thumbnail"/>
                            <span class="nama">`+value.nama_siswa+`</span>
                            <span class="text_muted" style="float: right;">`+value.alamat+`</span>
                        </li>`);
                    });
                }
            });
        });

        $('#resultlist').on('click', 'li', function(){
            let nama_siswa = $(this).children('.nama').text();

            $('#nama_siswa').val(nama_siswa);
            $('#resultlist').html('');
        });
    });
</script>
</html>