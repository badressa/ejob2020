
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          var myObj = JSON.parse(this.responseText);



       // Global Options
    Chart.defaults.global.defaultFontFamily = 'Lato';
    Chart.defaults.global.defaultFontSize = 18;
    Chart.defaults.global.defaultFontColor = '#777';  


    let myChart = document.getElementById('myChart').getContext('2d');
    

    

    let massPopChart = new Chart(myChart, {
      type:'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
      data:{
        ///cities from php using json
        labels: myObj.cities,
        datasets:[{
         // label:'Population',
          data:  myObj.statistics,
          //backgroundColor:'green',
          backgroundColor:[
            'rgba(54, 99, 132, 0.6)',
            'rgba(54, 162, 235, 0.6)',
            'rgba(54, 100, 120, 0.6)',
            'rgba(75, 192, 192, 0.6)',
            'rgba(153, 202, 255, 0.6)',
            'rgba(20, 100, 124, 0.6)',
            'rgba(25, 99, 132, 0.6)'
          ],
          borderWidth:1,
          borderColor:'#777',
          hoverBorderWidth:3,
          hoverBorderColor:'#000'
        }]
      },
      options:{
        title:{
          display:true,
          text:'Largest Cities In Massachusetts',
          fontSize:25
        },
        legend:{
          display:true,
          position:'right',
          labels:{
            fontColor:'#000'
          }
        },
        layout:{
          padding:{
            left:50,
            right:0,
            bottom:0,
            top:0
          }
        },
        tooltips:{
          enabled:true
        }
      }
    });



    let myPieChart = document.getElementById('myPieChart').getContext('2d');



let massPopChart = new Chart(myPieChart, {
type:'line', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
data:{
  ///cities from php using json
  labels: myObj.cities,
  datasets:[{
   // label:'Population',
    data:  myObj.statistics,
    //backgroundColor:'green',
    backgroundColor:[
      'rgba(54, 99, 132, 0.6)',
      'rgba(54, 162, 235, 0.6)',
      'rgba(54, 100, 120, 0.6)',
      'rgba(75, 192, 192, 0.6)',
      'rgba(153, 202, 255, 0.6)',
      'rgba(20, 100, 124, 0.6)',
      'rgba(25, 99, 132, 0.6)'
    ],
    borderWidth:1,
    borderColor:'#777',
    hoverBorderWidth:3,
    hoverBorderColor:'#000'
  }]
},
options:{
  title:{
    display:true,
    text:'Largest Cities In Massachusetts',
    fontSize:25
  },
  legend:{
    display:true,
    position:'right',
    labels:{
      fontColor:'#000'
    }
  },
  layout:{
    padding:{
      left:50,
      right:0,
      bottom:0,
      top:0
    }
  },
  tooltips:{
    enabled:true
  }
}
});





  }
};
xmlhttp.open("GET", "sendforchart.php", true);
xmlhttp.send();

