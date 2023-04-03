import React, { useMemo } from "react";
import ReactDOM from "react-dom/client";
import { CssBaseline, ThemeProvider, createTheme } from "@mui/material";
import { themeSettings } from "theme";
import { useSelector } from "react-redux";
import { BrowserRouter, Routes, Route, Navigate } from "react-router-dom";
import Dashboard  from "scenes/dashboard";
import  Layout  from "scenes/layout";
import CreateUser from "components/CreateUser";
import ListUser from "components/ListUser";
import EditUser from "components/EditUser";
function App(){
    const mode = useSelector((state) => state.global.mode);
    const theme = useMemo(() => createTheme(themeSettings(mode)), [mode]);

    return (
        <div className="app">
            <BrowserRouter>
                <ThemeProvider theme={theme}>   
                    <CssBaseline />
                    <Routes>
                        <Route element={<Layout />}>
                            <Route path="/" element={<Navigate to='/dashboard' replace />} />
                            <Route path="/dashboard" element={<Dashboard />} />
                            <Route path= "/user/create" element={<CreateUser />} />
                            <Route path= "/user/listuser" element={<ListUser />} />
                            <Route path= "/user/:id/edituser" element={<EditUser />} />
                        </Route>
                    </Routes>
                    
                </ThemeProvider>
            </BrowserRouter>
        </div>
    );  
}
export default App;