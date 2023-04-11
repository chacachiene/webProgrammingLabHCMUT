import React from 'react';
import { useState } from 'react';
import { Button } from '@mui/material';
import {useLocation, useNavigate} from 'react-router-dom';
import axios from 'axios';


function CreateProduct() {
    const location = useLocation();
    const navigate = useNavigate();
    const [product, setProduct] = useState({
        name: '',
        price: '',
        amount: '',
        description: ''
    })
    const handleChange = (e) => {
        const { name, value } = e.target;
        setProduct({ ...product, [name]: value })
    }
    const handleSubmit = (e) => {
        e.preventDefault();
        console.log(product);
        axios.post('http://localhost:80/api/product/save', product );
    }


  return (
    <div>
    <h1>Creat Product</h1>
      <form onSubmit={handleSubmit}>
        <div className="form-group">
          <label>Name </label>
          <input type="text" required name="name" onChange={handleChange} className="form-control" />
          <br />
          <label>Price </label>
          <input type="number" required name="price" onChange={handleChange} className="form-control" />
          <br />
          <label>Amount </label>
          <input type="number" required name="amount" onChange={handleChange} className="form-control" />
          <br />
          <label>Description </label>
          <input type="text" required name="description" onChange={handleChange} className="form-control" />
          <br />
          <Button variant="outlined" type="submit">Outlined</Button>
        </div>

      </form>
    </div>
  )
}

export default CreateProduct