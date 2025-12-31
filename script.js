document.getElementById("adhesionForm").addEventListener("submit", function (e) {
    e.preventDefault();
    alert("Votre demande d’adhésion a été soumise avec succès !");
    this.reset();
});

const canvas = document.getElementById("signature");
const ctx = canvas.getContext("2d");
let drawing = false;

canvas.onmousedown = () => drawing = true;
canvas.onmouseup = () => drawing = false;
canvas.onmousemove = e => {
    if (!drawing) return;
    ctx.lineTo(e.offsetX, e.offsetY);
    ctx.stroke();
};

function saveSignature() {
    document.getElementById("signatureData").value = canvas.toDataURL();
    alert("Signature enregistrée");
}
