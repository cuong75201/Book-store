let i=0;
// Chuyển cảnh trong list sách dọc
document.querySelectorAll('.owl-prev').forEach((element)=>{
    element.onclick=()=>{
        let getID=element.dataset.id;
        let list=document.getElementById(getID);
        let item=list.querySelectorAll('.owl-item');
        let a=243+(1215-item.length*243)/(item.length-1);
        if(i>0){
            list.style.transform=`translate3d(${-i*a+a}px,0,0)`;
            i=i-1;
        
        }
    }

});
document.querySelectorAll('.owl-next').forEach((element)=>{
    element.onclick=()=>{
        let getID=element.dataset.id;
        let list=document.getElementById(getID);
        let item=list.querySelectorAll('.owl-item');
        let a=243+(1215-item.length*243)/(item.length-1);
        if(i<item.length-1){
            i=i+1;
        list.style.transform=`translate3d(${-i*a}px,0,0)`;
        }
    }

});
function truncateText(text, maxLength) {
    if (text.length > maxLength) {
        return text.slice(0, maxLength) + "...";
    }
    return text;
}
document.querySelectorAll('.detail_product_combo a').forEach((element)=>{
    element.innerHTML=truncateText(element.innerHTML.trim(),50);
})