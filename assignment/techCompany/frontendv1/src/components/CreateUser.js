import { Button } from '@mui/material';
import React, {useState} from 'react';
import axios from 'axios';

function CreateUser() {
  const [inputs, setInputs] = useState({});

  const handleChange = (e) =>{
    const name = e.target.name;
    const value = e.target.value;
    setInputs({...inputs, [name]: value});
  }
  const handleSubmit = (e) => {
    e.preventDefault(); 
    axios.post('http://localhost:80/api/user/save', inputs);
    console.log(inputs);
  }
  return (
    <div>
      <h1>Creat Users</h1>
      <form onSubmit={handleSubmit}>
        <div className="form-group">
          <label>Username: </label>
          <input type="text" required name="name" onChange={handleChange} className="form-control" />
          <br />
          <label>Email: </label>
          <input type="text" required name="email" onChange={handleChange} className="form-control" />
          <br />
          <label>Phone: </label>
          <input type="text" required name="phone" onChange={handleChange} className="form-control" />
          <br />
          <Button variant="outlined" type="submit">Outlined</Button>
        </div>

      </form>
    </div>
  )
}

export default CreateUser