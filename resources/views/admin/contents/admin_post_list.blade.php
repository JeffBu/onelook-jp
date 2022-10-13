
@extends('admin.components.layout')
@section('page-title')
    <title>{{config('app.name')}} - Post List</title>
@endsection
@section('extra-styles')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
<style>
    #table_id th, #table_id td {
  word-break: break-all; /* IE supports this */
  word-break: break-word; /* IE doesn't support, and will ignore */
  /* http://caniuse.com/#feat=word-break */
  border: 1px solid rgb(167, 167, 167);

}

#t_body td{
    border: 1px solid rgb(167, 167, 167);
}
</style>
@endsection
@section('content')

<!--content-->
<div class="flex flex-col justify-center items-center w-full">
    <div class="flex justify-between items-center px-4 header-bg h-11 w-full sticky top-0 z-30">
        <div class="flex justify-start items-center gap-8">
            <button id="menu-button" onclick="toggleSidebar()"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg></button>
            <h1 class="text-lg font-semibold text-theme-white">動画リスト</h1>
        </div>
        <h1 class="text-lg font-semibold text-theme-white">管理画面</h1>
    </div>

    <div class="flex justify-center items-center w-full">
      
        <div class="flex flex-col justify-center items-center mt-8 w-11/12 z-10">
            <div class="flex items-center w-full">
                <h1 class="text-xl font-semibold text-lime-600">投稿一覧</h1>
            </div><br>
            
        
         
            <table class="md:table-fixed text-center border border-green w-full" id="table_id">
                <thead>
                    <tr class="border border-slate-700">
                        <th>動画名</th>
                        <th>投稿者ID</th>
                        <!-- <th >招待メール</th> -->
                        <th>閲覧数</th>
                        <th>投稿日</th>
                        <th>閲覧期限</th>
                        <th>動画の URL</th>
                        <th>閲覧URL</th>
                    </tr>
                </thead>

                <tbody class="border border-slate-700" id="t_body">
      
                </tbody>
            </table>

            <div class="flex justify-end items-center w-full mt-4">
                <button class="px-4 py-1 text-theme-white font-medium rounded-md bg-neutral-600 hover:bg-neutral-500">消去</button>
            </div>

            <div class="pt-32"></div>
        </div>
    </div>
</div>
<!--content ends here-->

<!-- Video Playback Modal -->
<div class="hidden fixed top-0 bottom-0 left-0 right-0 justify-center items-center outline-none overflow-x-hidden overflow-y-auto z-50" id="previewModal">
    <div class="w-11/12 md:w-10/12 lg:w-9/12 xl:w-3/5 h-3/4">
        <div class="modal-dialog modal-lg relative w-auto pointer-events-none">
            <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                <div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                    <h5 class="text-xl font-medium leading-normal text-neutral-800" id="exampleModalLgLabel">
                    プレビュー
                    </h5>
                    <button type="button" class="flex items-center btn-close box-content rounded-full opacity-60 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-neutral-900 hover:opacity-75 hover:no-underline"
                    onclick="closeModal();"><svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                    </svg></button>
                </div>

                <div class="modal-body relative p-4">
                    <video width="100%" height="400" id="video" controls>
                        <source src="" type="video/mp4">
                    </video>
                </div>

                <div class="flex flex-col sm:flex-row items-center justify-between p-4 border-t border-gray-200 rounded-t-md gap-2">
                    <input type="text" id="comment" class="w-full border-2 px-4 py-2 font-semibold rounded-md border-lime-600 text-left focus:ring-0 focus:outline-0 focus:border-lime-500" cols="30" rows="10" placeholder="コメント">
                    <input type="hidden" name="record-id" id="record-id">
                    <div class="flex flex-row items-center gap-2 w-2/3">
                        <button class="container px-4 py-2 text-theme-white font-medium rounded-md bg-lime-600 hover:bg-lime-500" onclick="approveVideo()">承認</button>
                        <button class="container px-4 py-2 text-theme-white font-medium rounded-md bg-neutral-600 hover:bg-neutral-500" onclick="denyVideo()">拒否</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Video Playback Modal -->
@endsection

@section('extra-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.16/clipboard.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js" integrity="sha512-efUTj3HdSPwWJ9gjfGR71X9cvsrthIA78/Fvd/IN+fttQVy7XWkOAXb295j8B3cmm/kFKVxjiNYzKw9IQJHIuQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<!--script-->
<script>
    $('#video-list').css('background-color', '#65a30d');
    $('#video-list').css('opacity', '1');
    const targetEl = document.getElementById('previewModal');
    const modal = new Modal(targetEl);

    let table = new DataTable('#table_id', {
            "processing": true,
            "serverSide": true,
            "language": {
                "paginate": {
                    "previous": "前のページ",
                    "next": "次"
                },      
                "sSearch": "探す:",
                "lengthMenu": "画面 _MENU_ ページあたりのレコード数",
                "zeroRecords": "何も見つかりませんでした - 申し訳ありません",
                "info": "表示中のページ _PAGE_ of _PAGES_",
                "infoEmpty": "利用可能なレコードがありません",
                "infoFiltered": "(からフィルタリング _MAX_ 総記録)",
            },
            "ajax": {
                "url": '{{ route('admin-post-list-datatable') }}',
                "dataType": "json",
                "type": "GET",
                "data": {
                    _token: "{{ csrf_token() }}"
                }
            },
            "columns": [{
                    "data": "title"
                },
                {
                    "data": "name"
                },
                {
                    "data": "views"
                },
                {
                    "data": "format"
                },
                {
                    "data": "modify"
                },
                {
                    "data": "btnUrl"
                },
                {
                    "data": "btnDownloadPlay"
                },
            ],
            "columnDefs": [{
                "orderable": false,
                "targets": [1, 2, 3, 4, 5, 6  ]
            }, ],
            initComplete: function() {
                $('.dataTables_filter input').unbind();
                $('.dataTables_filter input').bind('keyup', function(e) {
                    var code = e.keyCode || e.which;
                    if (code == 13) {
                        table.search(this.value).draw();
                    }
                });
            },
        });



    function closeModal(){
        modal.hide();
    }

    function addSource(id, path) {
       // set the modal menu element
        modal.show();
        var video = document.querySelector('#video');
        $('#record-id').val(id);
        video.src = path;
        
    }

    function approveVideo()
    {
        var content = $('#comment').val()
        var id = $('#comment').val()
    }

    var clipboard = new Clipboard('#btnCopyLink');
        clipboard.on('success', function(e) {
            e.clearSelection();
            $.notify("ビデオリンクのコピーが完了しました!","success");
        });
        clipboard.on('error', function(e) {
            $.notify("おっと！何かが間違っていた!","error");
        });


        function downloadVideo(id, button)
        {
            var url = "{{route('download')}}"

            axios.post(url, {
                id: id
            }).then((response) => {
                const link = document.createElement('a')
                link.href = response.data[0]
                link.setAttribute('download', response.data[1]);
                link.click();
                button.disabled = 'disabled'
            }).catch((error) => {
                Swal.fire({
                    title: "ERROR",
                    text: error.response.data['message'],
                    icon: 'danger',
                    showCancelButton: false
                })
            })
        }

    


</script>
<!--script ends here-->
@endsection
