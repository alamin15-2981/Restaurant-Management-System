const closeBtn = ()=>{
    let errorContainer = document.getElementById("error-container")
    console.log(errorContainer.setAttribute("style","display: none!important;"))

    window.location.href="http://localhost/RMS/admin/index.php"
}