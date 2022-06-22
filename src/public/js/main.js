'use strict'

{
  const today = new Date();
  let year = today.getFullYear();
  let month = today.getMonth();

  function displayThisMonth(){
    const thisMonth = `${year}年 ${String(month + 1).padStart(2, '0')}月`;
    document.getElementById('thisMonth').textContent = thisMonth;
  }

  displayThisMonth();
  
  document.getElementById('prev').addEventListener('click', ()=>{
    month--;
    if(month < 0){
      year--;
      month = 11;
    }
    displayThisMonth();
  });
  
  document.getElementById('next').addEventListener('click', ()=>{
    month++;
    if(month > 11){
      year++;
      month = 0;
    }
    displayThisMonth();
  });

  // const toModalLoading = document.getElementById('to-modalLoading');

  // toModalLoading.addEventListener('click', ()=>{
  //   $('#modalPost').modal('hide');
  //   $('#modalLoading').modal('show');

  //   setTimeout(function(){
  //     toModalSuccess();
  //   }, 2000)
  // })

  function toModalSuccess(){
    $('#modalLoading').modal('hide');
    $('#modalSuccess').modal('show');
  }

  let contentsExpanded = false;
  const contentsSelectBox = document.getElementById('modal-contents-select-box');
  const contentsCheckbox = document.getElementById('modal-contents-check-box');
  
  contentsSelectBox.addEventListener('click', ()=>{
    if(!contentsExpanded){
      contentsCheckbox.style.display = "block";
      contentsExpanded = true;
    }else{
      contentsCheckbox.style.display = "none";
      contentsExpanded = false;
    }
  });

  let languageExpanded = false;
  const languageSelectBox = document.getElementById('modal-language-select-box');
  const languageCheckbox = document.getElementById('modal-language-check-box');

  languageSelectBox.addEventListener('click', ()=>{
    if(!languageExpanded){
      languageCheckbox.style.display = "block";
      languageExpanded = true;
    }else{
      languageCheckbox.style.display = "none";
      languageExpanded = false;
    }
  });
}