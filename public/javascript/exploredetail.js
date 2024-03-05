var segmentTerakhir = window.location.href.split('/').pop();
var paginate = 1;
var dataExplore = [];
$.ajax({
    url: window.location.origin +'/exploredetail/'+segmentTerakhir+'/getdatadetail',
    type: "GET",
    dataType : "JSON",
    success: function(res){
        console.log(res);
        $('#fotodetail').prop('src', '/asset/'+res.dataDetailFoto.url)
        $('#fotouser').prop('src', '/asset/'+res.dataDetailFoto.user.picture)
        $('#judulfoto').html(res.dataDetailFoto.judul_foto)
        $('#deskripsifoto').html(res.dataDetailFoto.deskripsi_foto)
        $('#username').html(res.dataDetailFoto.user.username)
        // $('#tanggalunggah').html(res.dataDetailFoto.created_at)
        if (res.dataDetailFoto.id_user != null){
            if (res.dataDetailFoto.id_user !== res.dataUser){
                $("#drop").html(``);
            }
        }

        ambilKomentar()

    },
    error: function(jqXHR, textStatus, errorThrown){
        alert('gagal');
    },
})

function ambilKomentar(){
    var segmentTerakhir = window.location.href.split('/').pop();
    $.getJSON(window.location.origin +"/exploredetail/getComment/"+segmentTerakhir, function(res){
        console.log(res);
        if(res.data.length === 0){
            $('#listkomentar').html('<div>belum ada komentar</div>')
        }else{
            comment= []
            res.data.map((x)=>{
                let datacomentar = {
                    idUser: x.user.id,
                    pengirim: x.user.username,
                    waktu: x.created_at,
                    isikomentar: x.isi_komentar,
                    fotouser: x.user.picture,
                }
                comment.push(datacomentar);
            })
            tampilkankomentar()
        }
    })
}

const tampilkankomentar = ()=>{
    $('#listkomentar').html('')
    comment.map((x, i)=>{
        $('#listkomentar').append(`
        <div class="flex flex-col gap-3 mt-3">
        <div class="flex">
            <img src="/asset/${x.fotouser}" class=" bg-slate-200 w-8 h-8 rounded-full" alt="">
        <div class="flex-col mb-1">
            <div class="flex gap-2">
                <div class="text-base font-bold">${x.pengirim}</div>
                <div class="text-xs">${new Date(x.waktu).toLocaleDateString("id") }</div>
            </div>
            <div class="text-xs">${x.isikomentar}</div>
        </div>
        </div>
    </div>
        `)
    })
}

function kirimkomentar(){
    $.ajax({
        url: window.location.origin +'/exploredetail/kirimkomentar/',
        type: "POST",
        dataType: "JSON",
        data: {
            _token: $('input[name="_token"]').val(),
            idfoto: segmentTerakhir,
            isi_komentar: $('input[name="textkomentar"]').val()
        },
        success: function(res){
            $('input[name="textkomentar"]').val('');
        },
        error: function(jqXHR, tex, errorThrown){
            alert('gagal mengirim komentar')
        }
    })
}

setInterval(ambilKomentar, 500);
