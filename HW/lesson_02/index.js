//#region Params
const submit = document.getElementById('countryForm')
const countrySelect = document.getElementById('countryList')
const countryMsg = document.getElementById('countryMsg')
//#endregion

//#region Events
submit.addEventListener('submit', async (e) => await handleSubmit(e))

async function handleSubmit(e) {
    e.preventDefault()
    const formData = new FormData(e.target)
    await addCountry(formData)
}
//#endregion

//#region Functions
async function updateSelectItem(arr) {
    countrySelect.innerHTML = ''
    let placeholder = document.createElement('option')
    placeholder.text = 'Select country'
    placeholder.setAttribute('hidden', true)
    placeholder.setAttribute('disabled', true)
    placeholder.setAttribute('selected', true)
    countrySelect.appendChild(placeholder)

    arr.forEach((i) => {
        if (i.length > 0) {
            let option = document.createElement('option')
            option.text = i
            countrySelect.appendChild(option)
        }
    })
}

async function getCountries() {
    const resp = await fetch(`getCountries.php`)
    if (resp.ok) {
        const data = await resp.json()

        if (data != undefined && data.length > 0) {
            await updateSelectItem(data)
        }
    }
}

async function addCountry(formData) {
    try {
        const resp = await fetch('addCountry.php', {
            method: 'POST',
            body: formData,
        })

        if (resp.ok) {
            countryMsg.textContent = ''
            await getCountries()
        } else {
            countryMsg.textContent = resp.statusText
        }
    } catch (error) {
        //console.log(error)
    }
}
//#endregion

getCountries()
