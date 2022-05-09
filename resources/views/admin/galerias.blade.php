@extends('layouts.admin')

@section('conteudo')
<!-- Breadcomb area Start-->
<div class="breadcomb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcomb-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcomb-wp">
                                <div class="breadcomb-icon">
                                    <i class="notika-icon notika-app"></i>
                                </div>
                                <div class="breadcomb-ctn">
                                    <h2>Gerenciar Galerias</h2>
                                    <p> Adicionar - Download - Excluir </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="dropdone-nk ">
                    <div id="dropzone" class="multi-uploader-cs">
                        <form action="/api/galeria" class="dropzone dropzone-nk needsclick dz-clickable" method id="upload">
                            <div class="mg-0 dz-message needsclick download-custom">
                                <i class="notika-icon notika-cloud"></i>
                                <h2>Solte os arquivos aqui ou clique para fazer upload.</h2>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcomb area End-->
<!-- Form Element area Start-->
<div id="app">
    <galeria ref="galeria" :component="component"></galeria>
</div>
<!-- Data Table area End-->
@endsection

@section('configs')
<script>

    Dropzone.options.upload = {
        acceptedFiles: '.zip,.rar',
        init: function () {
            this.on("complete", function (file) {
                if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
                    window.app.getData()
                }
            });
        },
        accept: function(file, done) {
            done()
        }
    }


    window.controller = {
        data: () => {
            return {
                component: 'galeria'
            }
        },
        methods: {
            getData(){
                this.$refs.galeria.controller.getData()
            }
        }
    }

</script>
@endsection

