import { Button, Box, Table, TableBody, TableCell, TableContainer, TableHead, TablePagination,
          TableRow, TableSortLabel, Toolbar, Typography, Paper, Checkbox, IconButton, Tooltip,
          FormControlLabel, Switch } from '@mui/material';
import DeleteIcon from '@mui/icons-material/Delete';
import FilterListIcon from '@mui/icons-material/FilterList';
import { visuallyHidden } from '@mui/utils';
import PropTypes from 'prop-types';
import * as React from 'react';
import {useLocation, useNavigate, useState} from 'react-router-dom';
import axios from 'axios';
import { AllOut } from '@mui/icons-material';
import { createProduct, getProductById, getProducts } from 'services/productService';

function createData(
  id,
  name,
  price,
  quantity,
  description,
  image
){
  return { id, name, price, quantity, description, image };
}

var rows=[
  createData('1', "iphone 13",10000, 10, "this is a good","ch co")
]
rows.push(  createData('2', "iphone 14",10000, 10, "this is a good","ch co"))


function descendingComparator(a, b, orderBy){
  if (b[orderBy] < a[orderBy]) {
    return -1;
  }
  if (b[orderBy] > a[orderBy]) {
    return 1;
  }
  return 0;
}

function getComparator(order,orderBy){
  return order === 'desc'
    ? (a, b) => descendingComparator(a, b, orderBy)
    : (a, b) => -descendingComparator(a, b, orderBy);
}

function stableSort(array, comparator) {
  const stabilizedThis = array.map((el, index) => [el, index]);
  
  stabilizedThis.sort((a, b) => {
    const order = comparator(a[0], b[0]);
    if (order !== 0) {
      return order;
    }
    return a[1] - b[1];
  });
  return stabilizedThis.map((el) => el[0]);
}

const headCells= [
  {
    id: 'id',
    numeric: true,
    disablePadding: true,
    label: 'ID',
  },
  {
    id: 'name',
    numeric: true,
    disablePadding: false,
    label: 'Name',
  },
  {
    id: 'price',
    numeric: true,
    disablePadding: false,
    label: 'Price (VND)',
  },
  {
    id: 'description',
    numeric: true,
    disablePadding: false,
    label: 'Description',
  },
  {
    id: 'quantity',
    numeric: true,
    disablePadding: false,
    label: 'Quantity (cái)',
  },
];
const DEFAULT_ORDER = 'asc';
const DEFAULT_ORDER_BY = 'id';
const DEFAULT_ROWS_PER_PAGE = 5;

const EnhancedTableHead = (props) => {
  const { onSelectAllClick, order, orderBy, numSelected, rowCount, onRequestSort } = props;
  const createSortHandler = (newOrderBy) => (event) =>{
    onRequestSort(event, newOrderBy);
  }
  return (
    <TableHead>
      <TableRow>
        <TableCell padding="checkbox">
          <Checkbox
            indeterminate={numSelected > 0 && numSelected < rowCount}
            checked={rowCount > 0 && numSelected === rowCount}
            onChange={onSelectAllClick}
            inputProps={{ 'aria-label': 'select all desserts' }}
          />
        </TableCell>
        {headCells.map((headCell) => (
          <TableCell
            key={headCell.id}
            align={headCell.numeric ? 'right' : 'left'}
            padding={headCell.disablePadding ? 'none' : 'normal'}
            sortDirection={orderBy === headCell.id ? order : false}
          >
            <TableSortLabel
              active={orderBy === headCell.id}
              direction={orderBy === headCell.id ? order : DEFAULT_ORDER}
              onClick={createSortHandler(headCell.id)}
            >
              {headCell.label}
              {orderBy === headCell.id ? (
                <Box component="span" sx={visuallyHidden}>
                  {order === 'desc' ? 'sorted descending' : 'sorted ascending'}
                </Box>
              ) : null}
            </TableSortLabel>
          </TableCell>
        ))}
      </TableRow>
    </TableHead>
  );
};

EnhancedTableHead.propTypes = {
  numSelected: PropTypes.number.isRequired,
  onRequestSort: PropTypes.func.isRequired,
  onSelectAllClick: PropTypes.func.isRequired,
  order: PropTypes.oneOf(['asc', 'desc']).isRequired,
  orderBy: PropTypes.string.isRequired,
  rowCount: PropTypes.number.isRequired,
};
function EnhancedTableToolbar(props){
  const {numSelected} = props;
  return (
    <Toolbar
      sx={{
        pl: { sm: 2 },
        pr: { xs: 1, sm: 1 },
        ...(numSelected > 0 && {
          bgcolor: (theme) =>
            theme.palette.mode === 'light'
              ? theme.palette.primary.main
              : theme.palette.primary.dark,
        }),
      }}
    >
      {numSelected > 0 ? (
        <Typography
          sx={{ flex: '1 1 100%' }}
          color="inherit"
          variant="subtitle1"
          component="div"
        >
          {numSelected} selected
        </Typography>
      ) : (
        <Typography
          sx={{ flex: '1 1 100%' }}
          variant="h6"
          id="tableTitle"
          component="div"
        >
          Products
        </Typography>
      )}
      {numSelected > 0 ? (
        <Tooltip title="Delete">
          <IconButton>
            <DeleteIcon />
           </IconButton>
            </Tooltip>
            ) : (
              <Tooltip title="Filter list">
                <IconButton>
                  <FilterListIcon />
                  </IconButton>
                  </Tooltip>
                  )}
      </Toolbar>
    );
}
EnhancedTableToolbar.propTypes = {
  numSelected: PropTypes.number.isRequired,
}

const ListProduct = () => {
  const navigate = useNavigate();
  const location = useLocation();
  const [order, setOrder] = React.useState(DEFAULT_ORDER);
  const [orderBy, setOrderBy] = React.useState(DEFAULT_ORDER_BY);
  const [selected, setSelected] = React.useState([]);
  const [page, setPage] = React.useState(0);
  const [rowsPerPage, setRowsPerPage] = React.useState(DEFAULT_ROWS_PER_PAGE);
  const [visibleRows, setVisibleRows] = React.useState(null);
  const [paddingHeight, setPaddingHeight] = React.useState(0);
  const [dense, setDense] = React.useState(false);

  const [products, setProducts] = React.useState({});
  const [rows, setRows] = React.useState([]);
  React.useEffect(() => {
    async function fetchData() {
      try {
        const response = await getProducts();
        console.log(response);
        const newData = response.map((product) => {
          return createData(product.id, product.name, product.price, product.quantity, product.description, product.image);
        });
        setRows(newData);
        console.log(newData);

      } catch (error) {
        console.error(error);
      }
    }
    fetchData();
  }, []);
  React.useEffect( ()=> {
    
    let RowOnMount = stableSort(
      rows,
      getComparator(DEFAULT_ORDER, DEFAULT_ORDER_BY),
    );
    RowOnMount = RowOnMount.slice(0* DEFAULT_ROWS_PER_PAGE, 0*DEFAULT_ROWS_PER_PAGE + DEFAULT_ROWS_PER_PAGE);
    setVisibleRows(RowOnMount);
  }, []);
const handleRequestSort = React.useCallback(
  (event, newOrderBy) => {
    const isAsc = orderBy === newOrderBy && order === 'asc'; //careful
    const toggleOrder = isAsc ? 'desc' : 'asc';
    setOrder(toggleOrder);
    setOrderBy(newOrderBy);
    const sortedRows = stableSort(rows, getComparator(toggleOrder, newOrderBy));
    const updateRows = sortedRows.slice(
      page* rowsPerPage,
      page *  rowsPerPage + rowsPerPage,
    );
      setVisibleRows(updateRows);
  },
  [order, orderBy, page, rowsPerPage]
)
const handleSelectAllClick = (event)=>{
  if(event.target.checked){
    const newSelecteds = rows.map((n) => n.name);
    setSelected(newSelecteds);
    return;
  }
  setSelected([]);
}
const handleClick = (event, name) =>{
  const selectedIndex = selected.indexOf(name);
  let newSelected = [];
  if(selectedIndex === -1){
    newSelected = newSelected.concat(selected, name);
  } else if(selectedIndex === 0 ){
    newSelected = newSelected.concat(selected.slice(1));
  } else if( selectedIndex === selected.length -1 ){
    newSelected = newSelected.concat(selected.slice(0, -1));
  } else if( selectedIndex >0){
    newSelected = newSelected.concat(selected.slice(0, selectedIndex), selected.slice(selectedIndex +1));
  }
  setSelected(newSelected);
}
const handleChanePage = React.useCallback(
  (event, newPage) => {
    setPage(newPage);
    const updateRows = rows.slice(
      newPage * rowsPerPage,
      newPage * rowsPerPage + rowsPerPage,
    );
    setVisibleRows(updateRows);
    
  const numEmptyRows = 
    newPage > 0 ? Math.max(0, (1 + newPage) * rowsPerPage - rows.length) : 0;
      const newPaddinHeight = (dense ? 33 : 53) * numEmptyRows;
      setPaddingHeight(newPaddinHeight);
  },
  [order, orderBy, dense, rowsPerPage],
);
const handleRowsPage = React. useCallback(
  (event) => {
    const updateRowsPerPage = parseInt(event.target.value, 10);
    setRowsPerPage(updateRowsPerPage);
    setPage(0);
    const sortedRows = stableSort(rows, getComparator(order, orderBy));
    const updateRows = sortedRows.slice(0* updateRowsPerPage,0* updateRowsPerPage+ updateRowsPerPage);
  
  setVisibleRows(updateRows);
  setPaddingHeight(0);
  },
  [order, orderBy],
);
const handleChangeDense = (event) => {
  setDense(event.target.checked);
};
const isSelected = (name) => selected.indexOf(name) !== -1;

  return (
    <div>
        <h1>List Product</h1>
        <Button onClick={() =>{navigate('/product/create')} }>Add new product</Button>
        <Box sx={{width: '100%'}}>
          <Paper sx={{width: '100%', mb: 2}}>
            <EnhancedTableToolbar numSelected={selected.length} />
            <TableContainer>
              <Table
                sx={{ minWidth: 750 }}
                aria-labelledby="tableTitle"
                size={dense ? 'small' : 'medium'}
              >
                <EnhancedTableHead
                  numSelected={selected.length}
                  order={order}
                  orderBy={orderBy}
                  onSelectAllClick={handleSelectAllClick}
                  onRequestSort={handleRequestSort}
                  rowCount={rows.length}
                />
                <TableBody>
                  {visibleRows ? visibleRows.map((row, index) => {
                    const isItemSelected = isSelected(row.name);
                    const labelId = `enhanced-table-checkbox-${index}`;
                    return (
                      <TableRow
                        hover
                        onClick={(event) => handleClick(event, row.name)}
                        role="checkbox"
                        aria-checked={isItemSelected}
                        tabIndex={-1}
                        key={row.name}
                        selected={isItemSelected}
                      >

                        <TableCell padding="checkbox">
                          <Checkbox
                            checked={isItemSelected}
                            inputProps={{ 'aria-labelledby': labelId }}
                          />
                        </TableCell>
                        <TableCell component="th" id={labelId} scope="row" padding="none">
                           {row.id}
                        </TableCell>
                        <TableCell align="right">{row.name}</TableCell>
                        <TableCell align="right">{row.price}</TableCell>
                        <TableCell align="right">{row.description}</TableCell>
                        <TableCell align="right">{row.quantity}</TableCell>
                      </TableRow>
                    );
                  }) : null}
                  {paddingHeight > 0 && (
                  <TableRow style={{ height: paddingHeight }}>
                    <TableCell colSpan={6} />
                  </TableRow>
                  )}

                </TableBody>
              </Table>
            </TableContainer>
            <TablePagination
              rowsPerPageOptions={[5, 10, 25]}
              component="div"
              count={rows.length}
              rowsPerPage={rowsPerPage}
              page={page}
              onPageChange={handleChanePage}
              onRowsPerPageChange={handleRowsPage}
            />
          </Paper>
          <FormControlLabel
            control={<Switch checked={dense} onChange={handleChangeDense} />}
            label="Dense padding"
          />

        </Box>
    </div>
  )
}

export default ListProduct