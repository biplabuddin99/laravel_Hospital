import React,{useState,useEffect} from 'react';
import CrudService from '../services/CrudService';

const Registration = () => {
    const [bloods, setBloods]= useState([]);
    const [isLoadding, setIsLoadding]= useState(false);
    const [isError, setIsError]= useState(false);

    useEffect(()=>{
      getBlood();
  },[]);

  const [pregi, setPregi]= useState();

  const handelRegiChange = event =>{
      const {name, value} =event.target;
      setPregi({...pregi,[name]:value});
  }
  const saveRegi= () =>{
    CrudService.registration(pregi).then(response=>{
      document.getElementById('p_id_msg').innerHTML="Your Patient ID is "+response.data.patient_id
      console.log(response.data);
          //navigate('/students');
      }).catch(e=>{
          console.log(e);
      });
  }

  const getBlood= () =>{
    setIsLoadding(true);
    axios.get('http://localhost:8000/api/blood').then((res)=>{
    //   console.log('res:',res.data);
      setBloods(res.data)
    }).catch((err)=>{
      setIsError(err)
      console.log('err:',err);
    });
    setIsLoadding(false)

    // CrudService.getBlood().then(response=>{
    //   setBloods(response.data);console.log(response.data);
    //   console.log(bloods);
    //   }).catch(e=>{
    //       console.log(e);
    //   });
  }

  const content = !isLoadding && !isError && bloods.length  > 0 && bloods.map((blood) => {
    return (
      <option key={blood.id}>{blood.blood_name}</option>
    );
  });

return (
    <div id="menu1" className="tab-pane fade">
                <form className="form-horizontal" method="post" action="">
                    <div className="front_from">
                    <div className="form-group">
                        <div className="row">
                        <div className="col-md-6">
                            <label for="name">Full Name <span style={{color:"red"}}>*</span>:</label>
                            <input type="text" className="form-control" id="name" name="name" placeholder="First Name" required
                            onChange={handelRegiChange}/>
                        </div>
                        <div className="col-md-6">
                        <label for="age">Age <span style={{color:"red"}}>*</span>:</label>
                        <input type="number" className="form-control" id="age" name="age" placeholder="Age" required onChange={handelRegiChange}/>
                        </div>
                    </div>
                    </div>
                    <div className="form-group">
                    <label for="phone">Contact<span style={{color:"red"}}>*</span>:</label>
                    <input type="text" className="form-control" id="phone" name="phone" placeholder="Mobile Number" required onChange={handelRegiChange}/>
                    </div>
                    <div className="form-group">
                    <label for="gender">Gender<span style={{color:"red"}}>*</span>:</label>
                    &nbsp;
                    <input type="radio" onChange={handelRegiChange} name="gender1" value="1"/> Male
                    &nbsp;
                    <input type="radio" onChange={handelRegiChange} name="gender2" value="2"/> Female
                    &nbsp;
                    <input type="radio" onChange={handelRegiChange} name="gender3" value="3"/> Common
                    </div>
                    <div className="form-group">
                    <label for="dob">Date of Birth<span style={{color:"red"}}>*</span>:</label>
                    <input type="date" className="form-control" id="dob" name="dob" placeholder="Date of Birth" required onChange={handelRegiChange}/>
                    </div>
                    <div className="form-group">
                    <label for="blood">Blood Group:</label>
                    <select className="form-control" id="blood" onChange={handelRegiChange} name="blood" required>
                    {content}
                    </select>
                    </div>
                    <div className="form-group">
                    <label for="address">Address<span style={{color:"red"}}>*</span>:</label>
                    <textarea name="address" id="address" className="form-control" rows="1" required></textarea>
                    </div>
                    <div className="form-group">
                    <label for="problem">Problem<span style={{color:"red"}}>*</span>:</label>
                    <textarea name="problem" id="problem" className="form-control" rows="1" required></textarea>
                    </div>
                    <button type="button" onClick={() => saveRegi()} className="btn btn-primary">Submit</button>
                </div>
                </form>
                </div>
);
}

export default Registration;
