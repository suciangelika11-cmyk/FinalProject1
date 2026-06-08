function kirimWA() {
    let nama = document.getElementById("nama").value;
    let subjek = document.getElementById("subjek").value;
    let pesan = document.getElementById("pesan").value;

    let text =
        "Shalom 🙏\n\n" +
        "*Nama:* " + nama + "\n" +
        "*Kategori:* " + subjek + "\n" +
        "*Pesan:* " + pesan;

    let url =
        "https://wa.me/" +
        whatsappNumber +
        "?text=" +
        encodeURIComponent(text);

    window.open(url, "_blank");

    setTimeout(() => {
        window.location.href = homeUrl;
    }, 2000);
}