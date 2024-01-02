import React from 'react';
import Menu from '@/Components/Menu';

const Layout = ({ children }) => {
  return (
    <div>
      {/* Your menu component here */}
      <Menu/>

      {/* Page content */}
      {children}

      {/* Your footer component here */}
      <p>fseses</p>
    </div>
  );
};

export default Layout;