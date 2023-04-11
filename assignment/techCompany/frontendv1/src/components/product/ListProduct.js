import { Button } from '@mui/material'
import React from 'react'
import {useLocation, useNavigate} from 'react-router-dom';

const ListProduct = () => {
    const location = useLocation();
    const navigate = useNavigate();

  return (
    <div>
        <h1>List Product</h1>
        <Button onClick={() =>{navigate('/product/create')} }>Add new product</Button>

    </div>
  )
}

export default ListProduct