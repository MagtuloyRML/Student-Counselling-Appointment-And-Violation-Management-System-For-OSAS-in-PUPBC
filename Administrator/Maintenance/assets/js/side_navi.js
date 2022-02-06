const showMenu = (toggleID, navbarID, bodyID)=>{
    const toggle = document.getElementById(toggleID), 
    sidenavbar = document.getElementById(navbarID), 
    bodypadding = document.getElementById(bodyID)

    if (toggle && sidenavbar){
        toggle.addEventListener('click', ()=>{
            sidenavbar.classList.toggle('expander')

            bodypadding.classList.toggle('body-pd')
        })
    }
}
showMenu('nav-toggle','sideNavbar', 'body-pd')

const linkColor = document.querySelectorAll('.navi_link') 
function colorLink(){
    linkColor.forEach(l=> l.classList.remove('active_side'))
    this.classList.add('active_side')
}

linkColor.forEach(l => l.addEventListener('click', colorLink))
    