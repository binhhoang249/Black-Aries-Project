async function getAllOneTable(actional){
    try {
        let response = await fetch('http://localhost/Black-Aries-Project/public/ajax/serveData.php', {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ action: actional }),
        });

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        let data = await response.json();
        return data;
    } catch (error) {
        console.error("Error fetching data:", error);
        return null; 
    }
}
const textarea = document.getElementById("myTextarea");
textarea.addEventListener("change", function () {
    textarea.style.height = "auto"; // Reset chiều cao trước khi tính toán
    textarea.style.height = textarea.scrollHeight + "px"; // Điều chỉnh chiều cao theo nội dung
});
textarea.style.height = textarea.scrollHeight + "px";
var viewColor = document.getElementById('button-editColor');
var viewDetail = document.querySelector('.box-content');
var boxDetail= document.querySelector('.box_containerCard');
viewColor.addEventListener('click',function(){
    if(viewDetail.style.display == "block"){
        viewDetail.style.display = "block";
        document.querySelector('.title').querySelector('span').innerHTML = "COLOR";
        document.querySelector('.button-add').dataset.type=1;
        boxDetail.innerHTML="";
        colorDetailView()
    }else{
        viewDetail.style.display = "none";
        let colorupbutton = document.querySelectorAll('.up1');
        colorupbutton.forEach( up => {
            up.style.display = "block";
        })
        let colorcancelbutton = document.querySelectorAll('.cancel1');
        colorcancelbutton.forEach( cancel => {
            cancel.style.display = "none";
        })
        let colorupcolorbutton = document.querySelectorAll('.');
        colorupcolorbutton.forEach(up => {
            up.style.display = "none";
        })
    }
    
})
function colorDetailView(){
    (async ()=>{
        let colors = await getAllOneTable("getColor");
        for(let color of colors){
            boxDetail.innerHTML += 
            `
                <form class="box-card">
                    <button type="button" class="button-cancelDetail" onclick="deleteColor(${color.color_id})">X</button>
                    <div class="card-color2" style="background-color:${color.color_link} "></div>
                    <div class="field">
                        <span>Color Code:</span><input type="color" value="${color.color_link}" class="colorCode${color.color_id}">
                    </div>
                    <div class="field">
                        <span>Color name: </span><input type="text" value="${color.color_name}" required class="colorName${color.color_id}">
                    </div>
                    <div class="box-button">
                        <button type="button" class="up1 up1${color.color_id}" onclick="up1(${color.color_id})">Update</button>
                        <button type="button" class="cancel1 cancel1${color.color_id}" onclick="cancel(${color.color_id})">Cancel</button>
                        <button type="button" class="upColor upColor${color.color_id}" onclick="upColor(${color.color_id})">Verify</button>
                    </div>
                </form>
            `
        }
    })()
}