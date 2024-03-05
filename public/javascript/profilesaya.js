var segmentTerakhir = window.location.href.split("/").pop();

$.getJSON(window.location.origin +'/profilee/getDataProfile/'+segmentTerakhir, function(res){
    console.log(res)
    $('#namaUser').html(res.dataUser.username)
    $('#namalengkap').html(res.dataUser.nama_lengkap)
    $('#alamat').html(res.dataUser.alamat)
    $('#tanggalLahir').html(res.dataUser.tanggal_lahir)
    $('#imageUser').prop('src', '/asset/'+res.dataUser.picture)
})
var paginate = 1;
var dataExplore = [];
loadMoreData(paginate);
$(window).scroll(function () {
    if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
        paginate++;
        loadMoreData(paginate);
    }
});

function loadMoreData(paginate) {
    $.ajax({
        url: window.location.origin +"/getdataprofilesayaexplore/"+ "?page=" + paginate,
        type: "GET",
        dataType: "JSON",
        data:{
            idUser: segmentTerakhir
        },
        success: function(e){
            console.log(e);
            e.data.data.map((x)=>{
                var hasilPencarian = x.likefoto.filter(function(hasil){
                    return hasil.id_user === e.idUser
                })
                if(hasilPencarian.length <= 0){
                    userlike = 0;
                }else{
                    userlike = hasilPencarian[0].id_user;
                }
                let datanya = {
                    id: x.id,
                    judul: x.judul_foto,
                    deskripsi: x.deskripsi_foto,
                    foto: x.url,
                    tanggal: x.created_at,
                    jml_comment: x.comments_count,
                    jml_like: x.likefoto_count,
                    idUserLike: userlike,
                    useractive: e.idUser,
                }
                dataExplore.push(datanya);
                console.log(userlike)
                console.log(e.idUser)

            });
            getExplore();
        },
        error: function(jqXHR, textStatus, errorThrown) {},
    });

    const getExplore =()=>{
        $('#exploredatasaya').html("");
        dataExplore.map((x, i) => {
            $('#exploredatasaya').append(
                `<div class="flex w-1/5 border border-orange-500 mt-10">
                <div class="flex flex-col">
                <div class="overflow-hidden">
                  <img src="/asset/${x.foto}" alt="">
                </div>
                <div class="flex justify-between items-center">
                    <div class="font-bold">${x.judul}</div>
                    <div class="flex flex-col p-1">
                        <div>
                        <a href="/exploredetail/${x.id}"><span class="bi bi-chat-dots"></span></a>
                        <span class="bi ${x.idUserLike === x.useractive ? 'bi-heart-fill text-red-800' : 'bi-heart'}" onclick="likes(this, ${x.id})"></span>
                        </div>
                        <div class="flex text-xs text-right items-center justify-between p-1">
                                <div>${x.jml_comment}</div>
                                <div>${x.jml_like}</div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
                </div>`
            )
        });
    }
}
function likes(txt, id){
    $.ajax({
        url: window.location.origin +'/likefotos',
        dataType: "JSON",
        type: "POST",
        data: {
            _token: $('input[name="_token"]').val(),
            idfoto: id
        },
        success: function(res){
            console.log(res);
        },
        error: function(jqXHR, textStatus, errorThrown){
            alert('gagal');
        },
    })
}

