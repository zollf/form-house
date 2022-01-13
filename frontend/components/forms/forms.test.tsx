import React from 'react';
import { render } from '@testing-library/react';

import Forms from './';

it('matches its snapshot', () => {
  expect(render(<Forms />).baseElement).toMatchSnapshot();
});