export function displayPagination(current_page,numPage){
    var sesPage=document.getElementById('pagination');
    sesPage.innerHTML="";
    if(numPage>0){
        let numPagePres=1;
        let numPageNext=1;
        if(current_page==1 && numPage == 1){
            numPagePres=1;
            numPageNext=1;
        }else if(current_page==1){
            numPagePres=1;
            numPageNext=current_page+1;
        }else if(current_page==numPage){
             numPageNext=numPage;
             numPagePres=current_page-1;
        }else{
            numPagePres=current_page-1;
            numPageNext=current_page+1;
        }
        let nodeStart=document.createElement('div');
        nodeStart.dataset.page=1;
        nodeStart.style.width="100px";
        nodeStart.textContent="First page";
        sesPage.appendChild(nodeStart);
        let nodePres=document.createElement('div');
        nodePres.dataset.page=numPagePres;
        nodePres.textContent="<<";
        sesPage.appendChild(nodePres);
        if(numPage<=5){
            for(let i=1; i<=numPage;i++){
                let node=document.createElement('div');
                if(i==current_page){
                    node.className="act";
                }
                node.dataset.page=i;
                node.textContent=`${i}`;
                sesPage.appendChild(node);
            }
        }else{
            if((current_page-2)<1){
                for(let i=1;i<=current_page;i++){
                    let node=document.createElement('div');
                    if(i==current_page){
                        node.className="act";
                    }
                    node.dataset.page=i;
                    node.textContent=`${i}`;
                    sesPage.appendChild(node);
                }
                for(let i=(current_page+1);i<=5;i++){
                    let node=document.createElement('div');
                    if(i==current_page){
                        node.className="act";
                    }
                    node.dataset.page=i;
                    node.textContent=`${i}`;
                    sesPage.appendChild(node);
                }
            }else if(((current_page+2)-numPage)>0){
                let numPagePr=5-(1+(numPage-current_page));
                for(let i=(current_page-numPagePr);i<current_page;i++){
                    let node=document.createElement('div');
                    if(i==current_page){
                        node.className="act";
                    }
                    node.dataset.page=i;
                    node.textContent=`${i}`;
                    sesPage.appendChild(node);
                }
                for(let i=current_page;i<=numPage;i++){
                    let node=document.createElement('div');
                    if(i==current_page){
                        node.className="act";
                    }
                    node.dataset.page=i;
                    node.textContent=`${i}`;
                    sesPage.appendChild(node);
                }
            }else{
                for(let i=(current_page-2);i<=current_page+2;i++){
                    let node=document.createElement('div');
                    if(i==current_page){
                        node.className="act";
                    }
                    node.dataset.page=i;
                    node.textContent=`${i}`;
                    sesPage.appendChild(node);
                }
            }
        }
        let nodeNext=document.createElement('div');
        nodeNext.dataset.page=numPageNext;
        nodeNext.className="border-right"
        nodeNext.textContent=">>";
        sesPage.appendChild(nodeNext);
    }
    // Sự kiện khi nhấn vào phân trang
    pageCurrent(current_page);
    var boxPagination =document.getElementById('pagination');
    var butPaginations=boxPagination.querySelectorAll('div');
    butPaginations.forEach(buttonPage=>{
        buttonPage.addEventListener('click',function(){
            current_page=parseInt(buttonPage.dataset.page);
            pageCurrent(current_page);
            comfirmPageButton(current_page);
            displayPagination(current_page,numPage);
            
            alert(current_page)
        })
    })
    // function hiện các card có page là current_page
    function pageCurrent(numeber_page){
        var object= document.querySelectorAll('.row-object');
        object.forEach( value => {
            if(value.dataset.page != numeber_page){
                value.style.display = "none";
            }else{
                value.style.display = "table-row";
            }
        })
    }
    //Function hiện màu cho nút nào là nút hiện tại
    function comfirmPageButton(numeber_page){
        let box_pagination = document.getElementById('pagination');
        let button_pagination = box_pagination.querySelectorAll('div');
        button_pagination.forEach(button => {
            if(button.dataset.page == numeber_page){
                button.classList.add('act');
            }else{
                button.classList.remove('act');
            }
        })
    }
}