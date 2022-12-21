import http from "../http-common";
const registration = data=>{
    return http.post('registration',data);
}

const getBlood = () =>{
    return http.get('blood');
}

const destroy = id=>{
    return http.post('delete.php',id);
}

const getSingle = id=>{
    return http.post('retrive_single.php',id);
}

const update = data=>{
    return http.post('update.php',data);
}

const CrudService = {
    registration,getBlood,destroy,getSingle,update
}

export default CrudService;