$(".a_detalhes, .btn_detalhes").click(function (event) {
  event.preventDefault();

  var champUrl = $(this).attr("href");
  var champLoading = $(this).attr("data-loading");

  Swal.fire({
    title: "Carregando...",
    imageUrl: champLoading,
    showConfirmButton: false,
    allowOutsideClick: false,
    allowEscapeKey: false,
    allowEnterKey: false,
    timer: 5000,
    timerProgressBar: true,
    onBeforeOpen: () => {
      Swal.showLoading();
    },
  }).then(() => {
    window.location.href = champUrl;
  });
});

$(".btn_skins, .a_skins").click(function (event) {
  event.preventDefault();

  var champSkin = $(this).attr("data-skin");
  var champSkinName = $(this).attr("data-name-skin");

  Swal.fire({
    title: `Skin: ${champSkinName}`,
    html: `<img src=${champSkin}>`,
    width: 1280,
  });
});

$(".btn_spells, .a_spells").click(function (event) {
  event.preventDefault();

  var champSpellImage = $(this).attr("data-spell");
  var champSpellName = $(this).attr("data-name-spell");
  var champSpellDescription = $(this).attr("data-description-spell");

  Swal.fire({
    title: `Habilidade: ${champSpellName}`,
    html: `<img src=${champSpellImage}><br><br><p>${champSpellDescription}</p>`,
  });
});
