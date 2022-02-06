document.addEventListener('click', e =>{
    const isUserDropdownBttn = e.target.matches("[user-dropdown-menu-bttn]")
    if (!isUserDropdownBttn && e.target.closest('[user-dropdown-menu]') != null) return

    let currentDropDown
    if (isUserDropdownBttn){
        currentDropDown = e.target.closest('[user-dropdown-menu]')
        currentDropDown.classList.toggle('active')
    }

    document.querySelectorAll("[user-dropdown-menu].active").forEach(dropdown => {
        if (dropdown === currentDropDown) return
        dropdown.classList.remove('active')
    })
})

document.addEventListener('click', e =>{
    const isNotifDropdownBttn = e.target.matches("[notif-dropdown-bttn]")
    if (!isNotifDropdownBttn && e.target.closest('[notif-dropdown]') != null) return

    let currentDropDown1
    if (isNotifDropdownBttn){
        currentDropDown1 = e.target.closest('[notif-dropdown]')
        currentDropDown1.classList.toggle('active')
    }

    document.querySelectorAll("[notif-dropdown].active").forEach(dropdown1 => {
        if (dropdown1 === currentDropDown1) return
        dropdown1.classList.remove('active')
    })
})
