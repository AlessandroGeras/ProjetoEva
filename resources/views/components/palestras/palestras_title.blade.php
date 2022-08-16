<div id="palestras_title" class="no_margin">
    <h1>PALESTRAS</h1>

    <div id="criar_palestra" class="visible">
        @can("admin")
        <a href="#" id="criar_palestra_botao" onclick="criar_palestra(this.id)">
            <h3>CRIAR</h3>
        </a>
        @endcan
        <a href="#" id="pesquisar_palestra_botao" onclick="pesquisar_palestra(this.id)">
            <h3>PESQUISAR</h3>
        </a>
    </div>
</div>