$( document ).ready(function() {
    const findAllHolidays = async (country) => {
        const request = "/cvicenia/cvicenie6/service/holidays/findAll.php?country="+country;
        console.log(request);
        const response = await fetch(request);
        const myJson = await response.json();
        console.log(myJson);
    }
    const findAllMemorableDays = async (country) => {
        const request = "/cvicenia/cvicenie6/service/memorable_days/findAll.php?country="+country;
        console.log(request);
        const response = await fetch(request);
        const myJson = await response.json();
        console.log(myJson);
    }
    const findNameByDateAndCountry = async (day,month,country) => {
        const request = "/cvicenia/cvicenie6/service/names/findByDateAndCountry.php?country="+country+"&day="+day+"&month="+month;
        console.log(request);
        const response = await fetch(request);
        const myJson = await response.json();
        console.log(myJson);
    }
    const findByName = async (name,country) => {
        const request = "/cvicenia/cvicenie6/service/names/findByName.php?country="+country+"&name="+name;
        console.log(request);
        const response = await fetch(request);
        const myJson = await response.json();
        console.log(myJson);
    }
    const insertName = async (name,day_id,country_id) => {
        let formData = new FormData();
        formData.append('name', name);
        formData.append('day_id', day_id);
        formData.append('country_id', country_id);
        fetch("/cvicenia/cvicenie6/service/names/insertNew.php",
            {
                body: formData,
                method: "post"
            });
    }
    findAllHolidays("SK");
    findAllHolidays("CZ");
    findAllMemorableDays("SK");
    findNameByDateAndCountry("1","2","SK");
    findByName("Peter","SK");
    insertName("Judáš",365,12);
    let table = $("#table").DataTable({
        "searching": false,
        "ordering": false,
        "paging":   false,
        "info":     false,
    });
});