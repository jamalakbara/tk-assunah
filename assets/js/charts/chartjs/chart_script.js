const total = document.querySelectorAll('#total')
const akun = document.querySelectorAll('#akun')
const pengeluaran = document.querySelectorAll('#pengeluaran')

label_nama = []
total_anggaran = []
peng = []
console.log(total)

for (i = 0; i < akun.length; i++) {
    label_nama.push(akun[i].innerHTML)
}

for (i = 0; i < total.length; i++) {
    total_anggaran.push(total[i].innerHTML)
}

for (i = 0; i < pengeluaran.length; i++) {
    peng.push(pengeluaran[i].innerHTML)
}

console.log(label_nama)

var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        labels: label_nama,
        datasets: [{
            label: 'Anggaran Operasional',
            backgroundColor: 'rgb(55, 46, 232)',
            data: total_anggaran
        },
        {
            label: 'Pengeluaran Bulan Maret 2019',
            backgroundColor: 'rgb(237, 189, 45)',
            data: peng
        }]
    },

    // Configuration options go here
    options: {}
});