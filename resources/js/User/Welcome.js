function copyRek() {
    let text = document.getElementById("rek").innerText;
    navigator.clipboard.writeText(text);
    let btn = document.querySelector(".btn-copy");
    btn.innerText = "Tersalin ✓";
    setTimeout(() => { btn.innerText = "Salin"; }, 2000);
}

document.addEventListener("DOMContentLoaded", () => {
    const obs = new IntersectionObserver(entries => {
        entries.forEach(e => {
            if (e.isIntersecting) e.target.classList.add("show");
        });
    }, { threshold: 0.1 });
    document.querySelectorAll(".scroll").forEach(el => obs.observe(el));
});