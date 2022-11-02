var arrayy = [
    { fechas: "10-08-2022 08:30:25 pm" },
    {
        fechas: "10-08-2022 08:31:25 pm",
    },
    {
        fechas: "10-08-2022 08:32:04 pm",
    },
    {
        fechas: "10-08-2022 08:31:59 pm",
    },
    {
        fechas: "10-08-2022 08:29:04 pm",
    },
];

// Ordena por fecha datos como el ejemplo
console.log(
    arrayy.sort(
        (a, b) => new Date(a.fechas).getTime() - new Date(b.fechas).getTime()
    )
);
