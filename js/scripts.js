// ************************************************** //
// ************************************************** //

/* HOVERED LI CLASSES */
let list = document.querySelectorAll('.navigation li');
function activeLink(){
    list.forEach((item) =>
    item.classList.remove('hovered'));
    this.classList.add('hovered');
}
list.forEach((item) =>
item.addEventListener('click',activeLink));

// ************************************************** //
// ************************************************** //

let profile1 = document.querySelector('.profile-1');
let profile2 = document.querySelector('.profile-2');
let profile3 = document.querySelector('.profile-3');
let profile4 = document.querySelector('.profile-4');
let profile5 = document.querySelector('.profile-5');
let profile6 = document.querySelector('.profile-6');
let profile7 = document.querySelector('.profile-7');
let profile8 = document.querySelector('.profile-8');
let profile9 = document.querySelector('.profile-9');
let profile10 = document.querySelector('.profile-10');
let profile11 = document.querySelector('.profile-11');
let profile12 = document.querySelector('.profile-12');
let profile13 = document.querySelector('.profile-13');
let profile14 = document.querySelector('.profile-14');
let profile15 = document.querySelector('.profile-15');

let personalData = document.querySelector('#personal-data');
let locationData = document.querySelector('#location-data');
let medicalData = document.querySelector('#medical-data');
let physicalFeaturesData = document.querySelector('#physical-features');
let academicData = document.querySelector('#academic-data');
let workingData = document.querySelector('#working-data');
let workReferenceData = document.querySelector('#work-reference-data');
let gastronomicPreferencesData = document.querySelector('#gastronomic-preferences');
let hobbiesData = document.querySelector('#hobbies-sport-data');
let sportTeamsData = document.querySelector('#sport-teams');
let favoriteMusicData = document.querySelector('#favorite-music');
let favoriteMovieData = document.querySelector('#favorite-movie');
let programsData = document.querySelector('#programs-data');

profile1.onclick = function(){
    this.classList.add("active");
    profile2.classList.remove("active");
    profile3.classList.remove("active");
    profile4.classList.remove("active");
    profile5.classList.remove("active");
    profile6.classList.remove("active");
    profile7.classList.remove("active");
    profile8.classList.remove("active");
    profile9.classList.remove("active");
    profile10.classList.remove("active");
    profile11.classList.remove("active");
    profile12.classList.remove("active");
    profile13.classList.remove("active");
    profile14.classList.remove("active");
    profile15.classList.remove("active");

    this.classList.remove("unactive");
    profile2.classList.remove("unactive");
    profile3.classList.remove("unactive");
    profile4.classList.remove("unactive");
    profile5.classList.remove("unactive");
    profile6.classList.remove("unactive");
    profile7.classList.remove("unactive");
    profile8.classList.remove("unactive");
    profile9.classList.remove("unactive");
    profile10.classList.remove("unactive");
    profile11.classList.remove("unactive");
    profile12.classList.remove("unactive");
    profile13.classList.remove("unactive");
    profile14.classList.remove("unactive");
    profile15.classList.remove("unactive");

    personalData.removeAttribute("hidden");
    locationData.setAttribute("hidden", "true");
    medicalData.setAttribute("hidden", "true");
    physicalFeaturesData.setAttribute("hidden", "true");
    academicData.setAttribute("hidden", "true");
    workingData.setAttribute("hidden", "true");
    workReferenceData.setAttribute("hidden", "true");
    gastronomicPreferencesData.setAttribute("hidden", "true");
    hobbiesData.setAttribute("hidden", "true");
    sportTeamsData.setAttribute("hidden", "true");
    favoriteMusicData.setAttribute("hidden", "true");
    favoriteMovieData.setAttribute("hidden", "true");
    programsData.setAttribute("hidden", "true");
}
profile2.onclick = function(){
    this.classList.add("active");
    profile1.classList.add("unactive");
    profile3.classList.remove("active");
    profile4.classList.remove("active");
    profile5.classList.remove("active");
    profile6.classList.remove("active");
    profile7.classList.remove("active");
    profile8.classList.remove("active");
    profile9.classList.remove("active");
    profile10.classList.remove("active");
    profile11.classList.remove("active");
    profile12.classList.remove("active");
    profile13.classList.remove("active");
    profile14.classList.remove("active");
    profile15.classList.remove("active");
    
    this.classList.remove("unactive");
    profile3.classList.remove("unactive");
    profile4.classList.remove("unactive");
    profile5.classList.remove("unactive");
    profile6.classList.remove("unactive");
    profile7.classList.remove("unactive");
    profile8.classList.remove("unactive");
    profile9.classList.remove("unactive");
    profile10.classList.remove("unactive");
    profile11.classList.remove("unactive");
    profile12.classList.remove("unactive");
    profile13.classList.remove("unactive");
    profile14.classList.remove("unactive");
    profile15.classList.remove("unactive");

    locationData.removeAttribute("hidden");
    personalData.setAttribute("hidden", "true");
    medicalData.setAttribute("hidden", "true");
    physicalFeaturesData.setAttribute("hidden", "true");
    academicData.setAttribute("hidden", "true");
    workingData.setAttribute("hidden", "true");
    workReferenceData.setAttribute("hidden", "true");
    gastronomicPreferencesData.setAttribute("hidden", "true");
    hobbiesData.setAttribute("hidden", "true");
    sportTeamsData.setAttribute("hidden", "true");
    favoriteMusicData.setAttribute("hidden", "true");
    favoriteMovieData.setAttribute("hidden", "true");
    programsData.setAttribute("hidden", "true");
}
profile3.onclick = function(){
    this.classList.add("active");
    profile2.classList.add("unactive");
    profile1.classList.add("unactive");
    profile4.classList.remove("active");
    profile5.classList.remove("active");
    profile6.classList.remove("active");
    profile7.classList.remove("active");
    profile8.classList.remove("active");
    profile9.classList.remove("active");
    profile10.classList.remove("active");
    profile11.classList.remove("active");
    profile12.classList.remove("active");
    profile13.classList.remove("active");
    profile14.classList.remove("active");
    profile15.classList.remove("active");
    
    this.classList.remove("unactive");
    profile4.classList.remove("unactive");
    profile5.classList.remove("unactive");
    profile6.classList.remove("unactive");
    profile7.classList.remove("unactive");
    profile8.classList.remove("unactive");
    profile9.classList.remove("unactive");
    profile10.classList.remove("unactive");
    profile11.classList.remove("unactive");
    profile12.classList.remove("unactive");
    profile13.classList.remove("unactive");
    profile14.classList.remove("unactive");
    profile15.classList.remove("unactive");

    medicalData.removeAttribute("hidden");
    personalData.setAttribute("hidden", "true");
    locationData.setAttribute("hidden", "true");
    physicalFeaturesData.setAttribute("hidden", "true");
    academicData.setAttribute("hidden", "true");
    workingData.setAttribute("hidden", "true");
    workReferenceData.setAttribute("hidden", "true");
    gastronomicPreferencesData.setAttribute("hidden", "true");
    hobbiesData.setAttribute("hidden", "true");
    sportTeamsData.setAttribute("hidden", "true");
    favoriteMusicData.setAttribute("hidden", "true");
    favoriteMovieData.setAttribute("hidden", "true");
    programsData.setAttribute("hidden", "true");
}
profile4.onclick = function(){
    this.classList.add("active");
    profile2.classList.add("unactive");
    profile3.classList.add("unactive");
    profile1.classList.add("unactive");
    profile5.classList.remove("active");
    profile6.classList.remove("active");
    profile7.classList.remove("active");
    profile8.classList.remove("active");
    profile9.classList.remove("active");
    profile10.classList.remove("active");
    profile11.classList.remove("active");
    profile12.classList.remove("active");
    profile13.classList.remove("active");
    profile14.classList.remove("active");
    profile15.classList.remove("active");
    
    this.classList.remove("unactive");
    profile5.classList.remove("unactive");
    profile6.classList.remove("unactive");
    profile7.classList.remove("unactive");
    profile8.classList.remove("unactive");
    profile9.classList.remove("unactive");
    profile10.classList.remove("unactive");
    profile11.classList.remove("unactive");
    profile12.classList.remove("unactive");
    profile13.classList.remove("unactive");
    profile14.classList.remove("unactive");
    profile15.classList.remove("unactive");

    physicalFeaturesData.removeAttribute("hidden");
    academicData.setAttribute("hidden", "true");
    personalData.setAttribute("hidden", "true");
    locationData.setAttribute("hidden", "true");
    medicalData.setAttribute("hidden", "true");
    workingData.setAttribute("hidden", "true");
    workReferenceData.setAttribute("hidden", "true");
    gastronomicPreferencesData.setAttribute("hidden", "true");
    hobbiesData.setAttribute("hidden", "true");
    sportTeamsData.setAttribute("hidden", "true");
    favoriteMusicData.setAttribute("hidden", "true");
    favoriteMovieData.setAttribute("hidden", "true");
    programsData.setAttribute("hidden", "true");
}
profile5.onclick = function(){
    this.classList.add("active");
    profile2.classList.add("unactive");
    profile3.classList.add("unactive");
    profile4.classList.add("unactive");
    profile1.classList.add("unactive");
    profile6.classList.remove("active");
    profile7.classList.remove("active");
    profile8.classList.remove("active");
    profile9.classList.remove("active");
    profile10.classList.remove("active");
    profile11.classList.remove("active");
    profile12.classList.remove("active");
    profile13.classList.remove("active");
    profile14.classList.remove("active");
    profile15.classList.remove("active");
    
    this.classList.remove("unactive");
    profile7.classList.remove("unactive");
    profile8.classList.remove("unactive");
    profile9.classList.remove("unactive");
    profile10.classList.remove("unactive");
    profile11.classList.remove("unactive");
    profile12.classList.remove("unactive");
    profile13.classList.remove("unactive");
    profile14.classList.remove("unactive");
    profile15.classList.remove("unactive");

    academicData.removeAttribute("hidden");
    personalData.setAttribute("hidden", "true");
    locationData.setAttribute("hidden", "true");
    medicalData.setAttribute("hidden", "true");
    physicalFeaturesData.setAttribute("hidden", "true");
    workingData.setAttribute("hidden", "true");
    workReferenceData.setAttribute("hidden", "true");
    gastronomicPreferencesData.setAttribute("hidden", "true");
    hobbiesData.setAttribute("hidden", "true");
    sportTeamsData.setAttribute("hidden", "true");
    favoriteMusicData.setAttribute("hidden", "true");
    favoriteMovieData.setAttribute("hidden", "true");
    programsData.setAttribute("hidden", "true");
}
profile6.onclick = function(){
    this.classList.add("active");
    profile2.classList.add("unactive");
    profile3.classList.add("unactive");
    profile4.classList.add("unactive");
    profile5.classList.add("unactive");
    profile1.classList.add("unactive");
    profile7.classList.remove("active");
    profile8.classList.remove("active");
    profile9.classList.remove("active");
    profile10.classList.remove("active");
    profile11.classList.remove("active");
    profile12.classList.remove("active");
    profile13.classList.remove("active");
    profile14.classList.remove("active");
    profile15.classList.remove("active");
    
    this.classList.remove("unactive");
    profile7.classList.remove("unactive");
    profile8.classList.remove("unactive");
    profile9.classList.remove("unactive");
    profile10.classList.remove("unactive");
    profile11.classList.remove("unactive");
    profile12.classList.remove("unactive");
    profile13.classList.remove("unactive");
    profile14.classList.remove("unactive");
    profile15.classList.remove("unactive");

    workingData.removeAttribute("hidden");
    personalData.setAttribute("hidden", "true");
    locationData.setAttribute("hidden", "true");
    medicalData.setAttribute("hidden", "true");
    physicalFeaturesData.setAttribute("hidden", "true");
    academicData.setAttribute("hidden", "true");
    workReferenceData.setAttribute("hidden", "true");
    gastronomicPreferencesData.setAttribute("hidden", "true");
    hobbiesData.setAttribute("hidden", "true");
    sportTeamsData.setAttribute("hidden", "true");
    favoriteMusicData.setAttribute("hidden", "true");
    favoriteMovieData.setAttribute("hidden", "true");
    programsData.setAttribute("hidden", "true");
}
profile7.onclick = function(){
    this.classList.add("active");
    profile2.classList.add("unactive");
    profile3.classList.add("unactive");
    profile4.classList.add("unactive");
    profile5.classList.add("unactive");
    profile6.classList.add("unactive");
    profile1.classList.add("unactive");
    profile8.classList.remove("active");
    profile9.classList.remove("active");
    profile10.classList.remove("active");
    profile11.classList.remove("active");
    profile12.classList.remove("active");
    profile13.classList.remove("active");
    profile14.classList.remove("active");
    profile15.classList.remove("active");
    
    this.classList.remove("unactive");
    profile8.classList.remove("unactive");
    profile9.classList.remove("unactive");
    profile10.classList.remove("unactive");
    profile11.classList.remove("unactive");
    profile12.classList.remove("unactive");
    profile13.classList.remove("unactive");
    profile14.classList.remove("unactive");
    profile15.classList.remove("unactive");

    workReferenceData.removeAttribute("hidden");
    personalData.setAttribute("hidden", "true");
    locationData.setAttribute("hidden", "true");
    medicalData.setAttribute("hidden", "true");
    physicalFeaturesData.setAttribute("hidden", "true");
    academicData.setAttribute("hidden", "true");
    workingData.setAttribute("hidden", "true");
    gastronomicPreferencesData.setAttribute("hidden", "true");
    hobbiesData.setAttribute("hidden", "true");
    sportTeamsData.setAttribute("hidden", "true");
    favoriteMusicData.setAttribute("hidden", "true");
    favoriteMovieData.setAttribute("hidden", "true");
    programsData.setAttribute("hidden", "true");
}
profile8.onclick = function(){
    this.classList.add("active");
    profile2.classList.add("unactive");
    profile3.classList.add("unactive");
    profile4.classList.add("unactive");
    profile5.classList.add("unactive");
    profile6.classList.add("unactive");
    profile7.classList.add("unactive");
    profile1.classList.add("unactive");
    profile9.classList.remove("active");
    profile10.classList.remove("active");
    profile11.classList.remove("active");
    profile12.classList.remove("active");
    profile13.classList.remove("active");
    profile14.classList.remove("active");
    profile15.classList.remove("active");
    
    this.classList.remove("unactive");
    profile9.classList.remove("unactive");
    profile10.classList.remove("unactive");
    profile11.classList.remove("unactive");
    profile12.classList.remove("unactive");
    profile13.classList.remove("unactive");
    profile14.classList.remove("unactive");
    profile15.classList.remove("unactive");

    gastronomicPreferencesData.removeAttribute("hidden");
    personalData.setAttribute("hidden", "true");
    locationData.setAttribute("hidden", "true");
    medicalData.setAttribute("hidden", "true");
    physicalFeaturesData.setAttribute("hidden", "true");
    academicData.setAttribute("hidden", "true");
    workingData.setAttribute("hidden", "true");
    workReferenceData.setAttribute("hidden", "true");
    hobbiesData.setAttribute("hidden", "true");
    sportTeamsData.setAttribute("hidden", "true");
    favoriteMusicData.setAttribute("hidden", "true");
    favoriteMovieData.setAttribute("hidden", "true");
    programsData.setAttribute("hidden", "true");
}
profile9.onclick = function(){
    this.classList.add("active");
    profile2.classList.add("unactive");
    profile3.classList.add("unactive");
    profile4.classList.add("unactive");
    profile5.classList.add("unactive");
    profile6.classList.add("unactive");
    profile7.classList.add("unactive");
    profile8.classList.add("unactive");
    profile1.classList.add("unactive");
    profile10.classList.remove("active");
    profile11.classList.remove("active");
    profile12.classList.remove("active");
    profile13.classList.remove("active");
    profile14.classList.remove("active");
    profile15.classList.remove("active");
    
    this.classList.remove("unactive");
    profile10.classList.remove("unactive");
    profile11.classList.remove("unactive");
    profile12.classList.remove("unactive");
    profile13.classList.remove("unactive");
    profile14.classList.remove("unactive");
    profile15.classList.remove("unactive");

    hobbiesData.removeAttribute("hidden");
    personalData.setAttribute("hidden", "true");
    locationData.setAttribute("hidden", "true");
    medicalData.setAttribute("hidden", "true");
    physicalFeaturesData.setAttribute("hidden", "true");
    academicData.setAttribute("hidden", "true");
    workingData.setAttribute("hidden", "true");
    workReferenceData.setAttribute("hidden", "true");
    gastronomicPreferencesData.setAttribute("hidden", "true");
    sportTeamsData.setAttribute("hidden", "true");
    favoriteMusicData.setAttribute("hidden", "true");
    favoriteMovieData.setAttribute("hidden", "true");
    programsData.setAttribute("hidden", "true");
}
profile10.onclick = function(){
    this.classList.add("active");
    profile2.classList.add("unactive");
    profile3.classList.add("unactive");
    profile4.classList.add("unactive");
    profile5.classList.add("unactive");
    profile6.classList.add("unactive");
    profile7.classList.add("unactive");
    profile8.classList.add("unactive");
    profile9.classList.add("unactive");
    profile1.classList.add("unactive");
    profile11.classList.remove("active");
    profile12.classList.remove("active");
    profile13.classList.remove("active");
    profile14.classList.remove("active");
    profile15.classList.remove("active");
    
    this.classList.remove("unactive");
    profile11.classList.remove("unactive");
    profile12.classList.remove("unactive");
    profile13.classList.remove("unactive");
    profile14.classList.remove("unactive");
    profile15.classList.remove("unactive");

    sportTeamsData.removeAttribute("hidden");
    personalData.setAttribute("hidden", "true");
    locationData.setAttribute("hidden", "true");
    medicalData.setAttribute("hidden", "true");
    physicalFeaturesData.setAttribute("hidden", "true");
    academicData.setAttribute("hidden", "true");
    workingData.setAttribute("hidden", "true");
    workReferenceData.setAttribute("hidden", "true");
    gastronomicPreferencesData.setAttribute("hidden", "true");
    hobbiesData.setAttribute("hidden", "true");
    favoriteMusicData.setAttribute("hidden", "true");
    favoriteMovieData.setAttribute("hidden", "true");
    programsData.setAttribute("hidden", "true");
}
profile11.onclick = function(){
    this.classList.add("active");
    profile2.classList.add("unactive");
    profile3.classList.add("unactive");
    profile4.classList.add("unactive");
    profile5.classList.add("unactive");
    profile6.classList.add("unactive");
    profile7.classList.add("unactive");
    profile8.classList.add("unactive");
    profile9.classList.add("unactive");
    profile10.classList.add("unactive");
    profile1.classList.add("unactive");
    profile12.classList.remove("active");
    profile13.classList.remove("active");
    profile14.classList.remove("active");
    profile15.classList.remove("active");
    
    this.classList.remove("unactive");
    profile12.classList.remove("unactive");
    profile13.classList.remove("unactive");
    profile14.classList.remove("unactive");
    profile15.classList.remove("unactive");

    favoriteMusicData.removeAttribute("hidden");
    personalData.setAttribute("hidden", "true");
    locationData.setAttribute("hidden", "true");
    medicalData.setAttribute("hidden", "true");
    physicalFeaturesData.setAttribute("hidden", "true");
    academicData.setAttribute("hidden", "true");
    workingData.setAttribute("hidden", "true");
    workReferenceData.setAttribute("hidden", "true");
    gastronomicPreferencesData.setAttribute("hidden", "true");
    hobbiesData.setAttribute("hidden", "true");
    sportTeamsData.setAttribute("hidden", "true");
    favoriteMovieData.setAttribute("hidden", "true");
    programsData.setAttribute("hidden", "true");
}
profile12.onclick = function(){
    this.classList.add("active");
    profile2.classList.add("unactive");
    profile3.classList.add("unactive");
    profile4.classList.add("unactive");
    profile5.classList.add("unactive");
    profile6.classList.add("unactive");
    profile7.classList.add("unactive");
    profile8.classList.add("unactive");
    profile9.classList.add("unactive");
    profile10.classList.add("unactive");
    profile11.classList.add("unactive");
    profile1.classList.add("unactive");
    profile13.classList.remove("active");
    profile14.classList.remove("active");
    profile15.classList.remove("active");
    
    this.classList.remove("unactive");
    profile13.classList.remove("unactive");
    profile14.classList.remove("unactive");
    profile15.classList.remove("unactive");

    favoriteMovieData.removeAttribute("hidden");
    personalData.setAttribute("hidden", "true");
    locationData.setAttribute("hidden", "true");
    medicalData.setAttribute("hidden", "true");
    physicalFeaturesData.setAttribute("hidden", "true");
    academicData.setAttribute("hidden", "true");
    workingData.setAttribute("hidden", "true");
    workReferenceData.setAttribute("hidden", "true");
    gastronomicPreferencesData.setAttribute("hidden", "true");
    hobbiesData.setAttribute("hidden", "true");
    sportTeamsData.setAttribute("hidden", "true");
    favoriteMusicData.setAttribute("hidden", "true");
    programsData.setAttribute("hidden", "true");
}
profile13.onclick = function(){
    this.classList.add("active");
    profile2.classList.add("unactive");
    profile3.classList.add("unactive");
    profile4.classList.add("unactive");
    profile5.classList.add("unactive");
    profile6.classList.add("unactive");
    profile7.classList.add("unactive");
    profile8.classList.add("unactive");
    profile9.classList.add("unactive");
    profile10.classList.add("unactive");
    profile11.classList.add("unactive");
    profile12.classList.add("unactive");
    profile1.classList.add("unactive");
    profile14.classList.remove("active");
    profile15.classList.remove("active");
    
    this.classList.remove("unactive");
    profile14.classList.remove("unactive");
    profile15.classList.remove("unactive");

    programsData.removeAttribute("hidden");
    personalData.setAttribute("hidden", "true");
    locationData.setAttribute("hidden", "true");
    medicalData.setAttribute("hidden", "true");
    physicalFeaturesData.setAttribute("hidden", "true");
    academicData.setAttribute("hidden", "true");
    workingData.setAttribute("hidden", "true");
    workReferenceData.setAttribute("hidden", "true");
    gastronomicPreferencesData.setAttribute("hidden", "true");
    hobbiesData.setAttribute("hidden", "true");
    sportTeamsData.setAttribute("hidden", "true");
    favoriteMusicData.setAttribute("hidden", "true");
    favoriteMovieData.setAttribute("hidden", "true");
}
profile14.onclick = function(){
    this.classList.add("active");
    profile2.classList.add("unactive");
    profile3.classList.add("unactive");
    profile4.classList.add("unactive");
    profile5.classList.add("unactive");
    profile6.classList.add("unactive");
    profile7.classList.add("unactive");
    profile8.classList.add("unactive");
    profile9.classList.add("unactive");
    profile10.classList.add("unactive");
    profile11.classList.add("unactive");
    profile12.classList.add("unactive");
    profile13.classList.add("unactive");
    profile1.classList.add("unactive");
    profile15.classList.remove("active");
    
    this.classList.remove("unactive");
    profile15.classList.remove("unactive");
}
profile15.onclick = function(){
    this.classList.add("active");
    profile2.classList.add("unactive");
    profile3.classList.add("unactive");
    profile4.classList.add("unactive");
    profile5.classList.add("unactive");
    profile6.classList.add("unactive");
    profile7.classList.add("unactive");
    profile8.classList.add("unactive");
    profile9.classList.add("unactive");
    profile10.classList.add("unactive");
    profile11.classList.add("unactive");
    profile12.classList.add("unactive");
    profile13.classList.add("unactive");
    profile14.classList.add("unactive");
    profile15.classList.add("unactive");
    
    this.classList.remove("unactive");
}