// Ativar Toaster ao criar ou excluir um curso na página courses
const loading = (messagem) => {
  toastr.options = {
      progressBar: true,
      timeOut: "60000",
  };
  toastr["info"](messagem);
};


// Ativar Toaster ao criar com sucesso um curso na página courses

const message = (mensagem) => {
    toastr.options = {
        progressBar: true,
        timeOut: "5000",
    };
    toastr["success"](mensagem);
};
