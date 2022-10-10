<div id="edit_lecture" class="hidden mb-2">
  <div class="styled_input">
    <form action="{{ route('edit-lecture', [$lecture->id])}}" method="POST" onsubmit="if((document.getElementById('edit_lecture_date').value)>=('<?php echo date('Y-m-d\TH:i') ?>')){loading('Editando palestra');}">
      @csrf
      @method("PUT")
      <input class="styled_warning" id="edit_lecture_name" type="text" name="name" placeholder="Digite o nome da palestra" required></input>

      <button type="submit" class="styled_warning"> &#129122;</button>

      <input class="styled_warning" id="edit_lecture_info" type="text" name="info" placeholder="Digite a descrição da palestra" required></input>

      <input class="styled_warning" type="url" name="link" placeholder="Link para conteúdo extra"></input>

      <div id="warning_date_container">
        <input type="datetime-local" id="edit_lecture_date" name="date" value="<?php echo date("Y-m-d H:i"); ?>" min="<?php echo date('Y-m-d\TH:i') ?>">
      </div>
    </form>
  </div>
</div>