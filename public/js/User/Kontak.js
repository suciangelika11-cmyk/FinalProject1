function kirimWA() {
    console.log("WA Number:", whatsappNumber);

    let nama = document.getElementById("nama").value;
    let subjek = document.getElementById("subjek").value;
    let pesan = document.getElementById("pesan").value;

    let text =
        "Shalom Bapak/Ibu Pendeta \u{1F64F}\n\n" +
        "Dengan hormat, saya *" + nama + "* ingin menyampaikan *" + subjek + "*.\n\n" +
        "*Isi Pesan:*\n" + pesan + "\n\n" +
        "Kiranya Bapak/Ibu Pendeta berkenan meluangkan waktu untuk membaca pesan ini. Terima kasih atas perhatian dan pelayanannya.\n\n" +
        "Tuhan memberkati \u{1F64F}";

    console.log(text);
    console.log("🙏");
    console.log("\u{1F64F}");

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