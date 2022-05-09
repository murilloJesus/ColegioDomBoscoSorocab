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
                                    <i class="notika-icon notika-windows"></i>
                                </div>
                                <div class="breadcomb-ctn">
                                    <h2>Gerenciar Banners</h2>
                                    <p>Ver - Novo - Editar</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                            <div id="controller" class="breadcomb-report">
                                <button data-toggle="tooltip" data-placement="top" title="Exportar" class="btn"><i
                                        class="notika-icon notika-sent"></i></button>
                                <button data-toggle="tooltip" data-placement="top" title="Tabela"
                                    v-on:click="app.component = 'tabela'" class="btn"><i
                                        class="notika-icon notika-windows"></i></button>
                                <button data-toggle="tooltip" data-placement="top" title="Novo"
                                    v-on:click="app.component = 'formulario'" class="btn"><i
                                        class="notika-icon notika-plus-symbol"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcomb area End-->
<!-- Form Element area Start-->
<div id="app">
    <banner :component="component"></banner>
</div>
<!-- Data Table area End-->
@endsection

@section('configs')
<script>
    window.controller = {
        data: () => {
            return {
                component: 'tabela'
            }
        }
    }

</script>
@endsection
