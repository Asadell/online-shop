<h1>dashboard admin</h1>
<div>
  <article class="d-flex gap-4 justify-content-between">
    <div class="bg-white flex-grow-1 rounded p-3">
      <div class="d-flex justify-content-between align-items-center">
        <div>
          <h6>Total Revenue</h6>
          <h1>Rp. <?= number_format($revenueCount['sum'], 0, ',', '.') ?></h1>
        </div>
        <span style="background-color: #ff6452; width: 70px; height: 70px; color: white;" class="rounded-circle d-flex justify-content-center align-items-center"><i class="fa-solid fa-dollar-sign fa-2xl"></i></span>
      </div>
    </div>
    <div class="bg-white flex-grow-1 rounded p-3">
      <div class="d-flex justify-content-between align-items-center">
        <div>
          <h6>Product in Stock</h6>
          <h1><?= $productCount['count'] ?></h1>
        </div>
        <span style="background-color: #ff6452; width: 70px; height: 70px; color: white;" class="rounded-circle d-flex justify-content-center align-items-center"><i class="fa-solid fa-box-open fa-2xl"></i></span>
      </div>
    </div>
    <div class="bg-white flex-grow-1 rounded p-3">
      <div class="d-flex justify-content-between align-items-center">
        <div>
          <h6>Total Order</h6>
          <h1><?= $orderCount['count'] ?></h1>
        </div>
        <span style="background-color: #ff6452; width: 70px; height: 70px; color: white;" class="rounded-circle d-flex justify-content-center align-items-center"><i class="fa-solid fa-cart-shopping fa-2xl"></i></span>
      </div>
    </div>
    <div class="bg-white flex-grow-1 rounded p-3">
      <div class="d-flex justify-content-between align-items-center">
        <div>
          <h6>Total Customer</h6>
          <h1><?= $customerCount['count'] ?></h1>
        </div>
        <span style="background-color: #ff6452; width: 70px; height: 70px; color: white;" class="rounded-circle d-flex justify-content-center align-items-center"><i class="fa-solid fa-users fa-2xl"></i></span>
      </div>
    </div>
  </article>
  <div class="d-flex my-5 gap-3" style="height: 370px; width: 100%;">
    <div class="col-8 bg-white h-100" id="chartContainerSalesByCategory"></div>
    <div class="col-4 rounded h-100" id="chartContainer" data-sales='<?php echo $data["salesData"]; ?>'></div>
  </div>
  <div >
    <div id="chartContainerOrderedQty" style="height: 370px; width: 100%;"></div>
  </div>
</div>
<script>
  window.onload = function() {
    // Sales Comparison By Category
    const chartContainer = document.getElementById('chartContainer');
    const salesData = <?= $data['salesData']; ?>;
    const totalQty = <?= $data['totalQuantity']['sum']; ?>;
    const dataPoints = salesData.map(item => {
      console.log(item);
      return { y: (item.sum/totalQty)*100, label: item.name };
    });

    const chartCategory = new CanvasJS.Chart("chartContainer", {
        theme: "light2",
        animationEnabled: true,
        title: {
            text: "Sales Comparison by Category"
        },
        data: [{
            type: "pie",
            indexLabel: "{y}",
            yValueFormatString: "#,##0.00\"%\"",
            indexLabelPlacement: "inside",
            indexLabelFontColor: "#36454F",
            indexLabelFontSize: 18,
            indexLabelFontWeight: "bolder",
            showInLegend: true,
            legendText: "{label}",
            dataPoints: dataPoints
        }]
    });

    // Total Ordered Quantity
    const OrderedQty = <?= $data['totalOrderedQty']; ?>;
    const dataPointOrderedQty = OrderedQty.map(item => {
      return { label: item.name, y: item.sum };
    });
    const chartOrderedQty = new CanvasJS.Chart("chartContainerOrderedQty", {
      animationEnabled: true,
      theme: "light2",
      title:{
        text: "Total Orders per Product"
      },
      axisY: {
        title: "Order Quantity"
      },
      data: [{
        type: "column",
        yValueFormatString: "#,##0.## tonnes",
        dataPoints: dataPointOrderedQty
      }]
    });

    // Total Sales Per Category
    const totalSalesLaptop = <?= $data['totalSalesLaptop']; ?>;
    const totalSalesHanphone = <?= $data['totalSalesHanphone']; ?>;
    const totalSalesAccessories = <?= $data['totalSalesAccessories']; ?>;
    const dataPointTotalSalesLaptop = totalSalesLaptop.map(item => {
      return { x: (item.extract)*1000, y: item.sum };
    });
    const dataPointTotalSalesHanphone = totalSalesHanphone.map(item => {
      return { x: (item.extract)*1000, y: item.sum };
    });
    const dataPointTotalSalesAccessories = totalSalesAccessories.map(item => {
      return { x: (item.extract)*1000, y: item.sum };
    });
    const chartSalesByCategory = new CanvasJS.Chart("chartContainerSalesByCategory", {
      animationEnabled: true,
      title:{
        text: "Comparison of Sales Across Categories"
      },
      subtitles: [{
        text: "Total Sales per Category",
        fontSize: 18
      }],
      axisY: {
        prefix: "Rp "
      },
      legend:{
        cursor: "pointer",
        itemclick: toggleDataSeriesSalesByCategory
      },
      toolTip: {
        shared: true
      },
      data: [
      {
        type: "area",
        name: "Laptop Sales",
        showInLegend: "true",
        xValueType: "dateTime",
        xValueFormatString: "MMM YYYY",
        yValueFormatString: "Rp #,##0.##",
        dataPoints: dataPointTotalSalesLaptop
      },
      {
        type: "area",
        name: "Handphone Sales",
        showInLegend: "true",
        xValueType: "dateTime",
        xValueFormatString: "MMM YYYY",
        yValueFormatString: "Rp #,##0.##",
        dataPoints: dataPointTotalSalesHanphone
      },
      {
        type: "area",
        name: "Accessories Sales",
        showInLegend: "true",
        xValueType: "dateTime",
        xValueFormatString: "MMM YYYY",
        yValueFormatString: "Rp #,##0.##",
        dataPoints: dataPointTotalSalesAccessories
      },
      ]
    });
    
    chartSalesByCategory.render();
    chartOrderedQty.render();
    chartCategory.render();
    
    function toggleDataSeriesSalesByCategory(e){
      if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
        e.dataSeries.visible = false;
      }
      else{
        e.dataSeries.visible = true;
      }
      chart.render();
    }
  }
</script>
